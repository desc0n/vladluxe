<?php

/**
 * Class Model_Notice
 */
class Model_Notice extends Kohana_Model
{
	const NOTICES_MARKET_LIMIT = 12;

	public function __construct() {
	    DB::query(Database::UPDATE,"SET time_zone = '+10:00'")->execute();
    }

	/**
	 * @param array $params
	 *
	 * @return array
	 */
	public function getNotice($params = [])
	{
		$name = Arr::get($params, 'name');
		$page = Arr::get($params, 'page', 1);

		$rowLimit = Arr::get($params, 'limit', 0);
		$startLimit = ($page - 1) * $rowLimit;
		$limit = empty($rowLimit) ? '' : "limit $startLimit, $rowLimit";
		
		$price = Arr::get($params, 'price', 0);
		$priceSql = empty($price) ? '' : ' and `n`.`price` <= :price ';
		$priceCountSql = empty($price) ? '' : ' and `nt`.`price` <= :price ';
		$names =  !empty($name) ? explode(' ', $name) : [];
		$nameSql = '';
		$nameCountSql = '';
		
		foreach ($names as $name) {
			$nameSql .= " and `n`.`name` like '%$name%' ";
			$nameCountSql .= " and `nt`.`name` like '%$name%' ";
		}
		
		$sort = Arr::get($params, 'sort', 'sort');
		$order = Arr::get($params, 'order', 'asc');
		
		$id = Arr::get($params, 'id', 0);
		$districtId = Arr::get($params, 'district_id', 0);
		
		if (!empty($id)) {
			$sql = "select `n`.*,
            (select `c`.`name` from `districts` `c` where `c`.`id` = `n`.`district`) as `district_name`
            from `notice` `n`
            where `n`.`id` = :id
            and `n`.`status_id` = 1
            LIMIT 0,1";
		} else if (!empty($districtId)) {
			$sql = "select `n`.*,
			(select ceil(count(`nt`.`id`) / $rowLimit) from `notice` `nt` where `nt`.`district` = :district_id and `nt`.`status_id` = 1 $priceCountSql $nameCountSql) as `page_count`,
			(select `c`.`name` from `districts` `c` where `c`.`id` = `n`.`district`) as `district_name`
			from `notice` `n`
			where (
			    `n`.`district` = :district_id
			    or `n`.`district` in (select `c`.`id` from `districst` `c` where `c`.`parent_id` = :district_id)
            )
			and `n`.`status_id` = 1
			$priceSql
			$nameSql
			order by `$sort` $order
			$limit";
		} else {
			$sql = "select `n`.*,
			(select ceil(count(`nt`.`id`) / $rowLimit) from `notice` `nt` where `nt`.`status_id` = 1 $priceCountSql $nameCountSql) as `page_count`,
			(select `c`.`name` from `district` `c` where `c`.`id` = `n`.`district`) as `district_name`
			from `notice` `n`
			where `n`.`status_id` = 1
			$priceSql
			$nameSql
			order by `$sort` $order
			$limit";
		}

		$noticeData = [];
		$i = 0;

		$res = DB::query(Database::SELECT, $sql)
			->parameters([
				':id' => $id,
				':district_id' => $districtId,
				':price' => $price
			])
			->execute()
			->as_array()
		;

		foreach ($res as $row) {
			$noticeData[$i] = $row;
			$noticeData[$i]['imgs'] = $this->getNoticeImg($row);
			$noticeData[$i]['files'] = $this->getNoticeFile($row);
			$i++;
		}

		return $noticeData;
	}

	/**
	 * @param int $id
	 *
	 * @return array
	 */
	public function find($id)
	{
        $result = DB::select(
			    'n.*',
                [DB::select('c.name')->from(['districts', 'c'])->where('c.id', '=', DB::expr('n.district')), 'district_name']
            )
            ->from(['notice', 'n'])
            ->where('n.id', '=', $id)
            ->and_where('n.status_id', '=', 1)
            ->limit(1)
			->execute()
			->current()
		;

		return !$result ? [] : $result;
	}

	public function setNotice($params = [])
	{
		DB::update('notice')
        	->set([
        		'article' => ':article',
        		'name' => ':name',
				'price' => ':price',
				'description' => ':description',
				'short_description' => ':short_description',
				'status_id' => 1,
				'sort' => ':sort'
			])
			->where('id', '=', ':id')
			->parameters([
				':id' => Arr::get($params,'redactnotice'),
				':article' => Arr::get($params,'article',''),
				':name' => Arr::get($params,'name',''),
				':price' => Arr::get($params,'price',''),
				':description' => Arr::get($params,'description',''),
				':short_description' => Arr::get($params,'short_description',''),
				':sort' => Arr::get($params, 'sort', 1)
			])
			->execute()
		;
	}

	public function setNoticeParams($params = [])
	{
		$sql = "insert into `notice_params`
        (`notice_id`, `name`, `value`, `status_id`)
        values (:notice_id, :name, :value, 1)";
		DB::query(Database::UPDATE,$sql)
			->param(':notice_id', Arr::get($params,'newNoticeParam'))
			->param(':name', Arr::get($params,'newParamsName',''))
			->param(':value', Arr::get($params,'newParamsValue',''))
			->execute();
	}

	public function getNoticeParams($params = [])
	{
		$sql = "select * from `notice_params` where `notice_id` = :id and `status_id` = 1";
		return DB::query(Database::SELECT, $sql)
			->param(':id', Arr::get($params, 'id', 0))
			->execute()
			->as_array();
	}


    public function removeNoticeParams($params = [])
    {
        $sql = "update `notice_params` set `status_id` = 0 where `id` = :id";
        DB::query(Database::UPDATE,$sql)
            ->param(':id', Arr::get($params,'removeProductParam',0))
            ->execute();
    }

    public function getNoticeImg($params = [])
	{
		$sql = "select * from `notice_img` where `notice_id` = :id and `status_id` = 1";
		return DB::query(Database::SELECT, $sql)
			->param(':id', Arr::get($params, 'id', 0))
			->execute()
			->as_array();
	}

	public function removeNoticeImg($params = [])
	{
		$sql = "update `notice_img` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'removeimg',0))
			->execute();
	}

	public function deleteNotice($params)
	{
		$sql = "update `notice` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'id',0))
			->execute();
	}

	public function getNoticeFile($params = [])
	{
		$sql = "select * from `notice_file` where `notice_id` = :id and `status_id` = 1";
		return DB::query(Database::SELECT, $sql)
			->param(':id', Arr::get($params, 'id', 0))
			->execute()
			->as_array();
	}


    public function loadNoticeFile($filesGlobal, $notice_id)
    {
        $filesData = [];

        foreach ($filesGlobal['filename']['name'] as $key => $data) {
            $filesData[$key]['name'] = $filesGlobal['filename']['name'][$key];
            $filesData[$key]['type'] = $filesGlobal['filename']['type'][$key];
            $filesData[$key]['tmp_name'] = $filesGlobal['filename']['tmp_name'][$key];
            $filesData[$key]['error'] = $filesGlobal['filename']['error'][$key];
            $filesData[$key]['size'] = $filesGlobal['filename']['size'][$key];
        }

        foreach ($filesData as $files) {
            $sql = "insert into `notice_file` (`notice_id`) values (:id)";
            $res = DB::query(Database::INSERT,$sql)
                ->param(':id', $notice_id)
                ->execute();

            $new_id = $res[0];
            $imageName = Arr::get($files,'name','');
            //$imageName = preg_replace("/[^0-9a-z.]+/i", "0", Arr::get($files,'name',''));
            $file_name = 'public/files/'.$new_id.'_'.$imageName;
            if (copy($files['tmp_name'], $file_name))	{
                $sql = "update `notice_file` set `src` = :src,`status_id` = 1 where `id` = :id";
                DB::query(Database::UPDATE,$sql)
                    ->param(':id', $new_id)
                    ->param(':src', $new_id.'_'.$imageName)
                    ->execute();
            }
        }
    }

	public function removeNoticeFile($params = [])
	{
		$sql = "update `notice_file` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'removefile',0))
			->execute();
	}

	public function deleteNoticeSale($params)
	{
		$sql = "update `notice_sale` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'id',0))
			->execute();
	}

	public function findLastSeeItems()
	{
		$data = [];

		$views = DB::select()
			->from('notice__views')
			->limit(4)
			->order_by('id', 'DESC')
			->group_by('notice_id')
			->execute()
			->as_array()
		;

		foreach ($views as $view) {
			$noticeData = $this->getNotice(['id' =>$view['notice_id']]);
			$data[] = Arr::get($noticeData, 0, []);
		}

		return $data;
	}
	
	public function setNoticeView($id)
	{
		$ip = Arr::get($_SERVER, 'REMOTE_ADDR', '');

		$lastView = DB::select()
			->from('notice__views')
			->limit(1)
			->order_by('id', 'DESC')
			->execute()
			->current()
		;
		
		$lastViewIp = Arr::get($lastView, 'ip', '');
		$lastViewNoticeId = Arr::get($lastView, 'notice_id', '');

		if ($lastViewIp !== $ip || (int)$lastViewNoticeId !== (int)$id) {
			DB::insert('notice__views', ['notice_id', 'ip', 'date'])
				->values([$id, $ip, DB::expr('NOW()')])
				->execute()
			;
		}
	}

	public function addNotice($params = [])
	{
		$res = DB::insert('notice', ['name', 'district', 'street', 'house', 'floor', 'flat_count', 'price', 'description'])
			->values([
				Arr::get($params, 'name', ''),
				Arr::get($params, 'district'),
				Arr::get($params, 'street'),
				Arr::get($params, 'house'),
				Arr::get($params, 'floor'),
				Arr::get($params, 'flat_count', 1),
				Arr::get($params, 'price', 0),
				Arr::get($params, 'description', ''),
			])
			->execute()
		;

		$noticeId = $res[0];

		DB::update('notice')
			->set(['sort' => $noticeId])
			->where('id', '=', $noticeId)
			->execute()
		;

		return $noticeId;
	}
}
?>
