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
	 * @param int $id
	 *
	 * @return array
	 */
	public function findById($id)
	{
        $result = DB::select(
			    'n.*',
                [DB::select('d.name')->from(['districts', 'd'])->where('d.id', '=', DB::expr('n.district')), 'district_name'],
                [DB::select('t.name')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'type_name']
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
        		'type' => Arr::get($params, 'type'),
        		'name' => Arr::get($params, 'name', ''),
				'district' => Arr::get($params, 'district'),
				'street' => Arr::get($params, 'street'),
				'house' => Arr::get($params, 'house'),
				'floor' => Arr::get($params, 'floor'),
				'price' => Arr::get($params, 'price', 0),
				'description' => Arr::get($params, 'description', '')
			])
			->where('id', '=', Arr::get($params,'redact_notice'))
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

	/**
	 * @param $id
	 *
	 * @return array
	 */
    public function getNoticeImg($id)
	{
		return DB::select()
			->from('notice_img')
			->where('notice_id', '=', $id)
			->and_where('status_id', '=', 1)
			->execute()
			->as_array()
		;
	}

	/**
	 * @param $id
	 */
	public function removeNoticeImg($id)
	{
		DB::update('notice_img')
			->set([
				'status_id' => 0,
				'updated_at' => DB::expr('NOW()')
			])
			->where('id', '=', $id)
			->execute()
		;
	}

	/**
	 * @param $id
	 */
	public function removeNotice($id)
	{
		DB::update('notice')
			->set(['status_id' => 0])
			->where('id', '=', $id)
			->execute()
		;
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

	/**
	 * @param int $limit
	 *
	 * @return array
	 */
	public function findPopular($limit = 4)
	{
		$data = [];

		$views = DB::select()
			->from('notice__views')
			->limit($limit)
			->order_by('id', 'DESC')
			->group_by('notice_id')
			->execute()
			->as_array()
		;

		foreach ($views as $view) {
			$noticeData = $this->findById($view['notice_id']);

			if (!empty($noticeData)) {
				$data[] = $noticeData;
			}
		}

		return $data;
	}

	public function getList($page, $limit)
	{
		return DB::select('n.*', ['d.name', 'district_name'], ['t.name', 'type_name'])
			->from(['notice', 'n'])
			->join(['districts', 'd'], 'left')
			->on('d.id', '=', 'n.district')
			->join(['notice__type', 't'], 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->offset((($page - 1) * $limit))
			->limit(($page * $limit))
			->order_by('n.id', 'DESC')
			->execute()
			->as_array()
		;
	}

	public function getListPaginationCount($limit)
	{
		$count = DB::select()
			->from('notice')
			->where('status_id', '=', 1)
			->execute()
			->count()
		;

		return ceil($count / $limit);
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
		$res = DB::insert('notice', ['type', 'name', 'district', 'street', 'house', 'floor', 'price', 'description'])
			->values([
				Arr::get($params, 'type'),
				Arr::get($params, 'name', ''),
				Arr::get($params, 'district'),
				Arr::get($params, 'street'),
				Arr::get($params, 'house'),
				Arr::get($params, 'floor'),
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


    public function loadNoticeImg($filesGlobal, $noticeId)
    {
        $filesData = [];

        foreach ($filesGlobal['imgname']['name'] as $key => $data) {
            $filesData[$key]['name'] = $filesGlobal['imgname']['name'][$key];
            $filesData[$key]['type'] = $filesGlobal['imgname']['type'][$key];
            $filesData[$key]['tmp_name'] = $filesGlobal['imgname']['tmp_name'][$key];
            $filesData[$key]['error'] = $filesGlobal['imgname']['error'][$key];
            $filesData[$key]['size'] = $filesGlobal['imgname']['size'][$key];
        }

        foreach ($filesData as $files) {
            $res = DB::insert('notice_img', ['notice_id'])
                ->values([$noticeId])
                ->execute();

            $new_id = $res[0];

            $imageName = preg_replace("/[^0-9a-z.]+/i", "0", Arr::get($files,'name',''));
            $file_name = 'public/img/original/' . $new_id . '_' . $imageName;

            if (copy($files['tmp_name'], $file_name))	{
                $image = Image::factory($file_name);
                $image
                    ->resize(500, NULL)
                    ->save($file_name,100)
                ;

                $thumb_file_name = 'public/img/thumb/' . $new_id . '_' . $imageName;

                if (copy($files['tmp_name'], $thumb_file_name))	{
                    $thumb_image = Image::factory($thumb_file_name);
                    $thumb_image
						->resize(300, NULL)
						->save($thumb_file_name,100)
					;

                    DB::update('notice_img')
						->set([
							'src' => $new_id . '_' . $imageName,
							'status_id' => 1,
							'updated_at' => DB::expr('NOW()')
						])
						->where('id', '=', $new_id)
                        ->execute()
					;
                }
            }
        }
    }

	/**
	 * @return array
	 */
    public function findAllTypes()
	{
		return DB::select()
			->from('notice__type')
			->order_by('id', 'ASC')
			->execute()
			->as_array('id', 'name')
		;
	}

    /**
     * @param array $query
     * @return array
     */
	public function searchNotices($query = [])
	{
		$page = Arr::get($query, 'page', 1);
		$limit = Arr::get($query, 'limit', 30);
		$district = Arr::get($query, 'district');
		$type = Arr::get($query, 'type');
		$priceFrom = Arr::get($query, 'price_from', 0);
		$priceTo = Arr::get($query, 'price_to', 0);
		$order = Arr::get($query, 'order');

		$notices = [];

		$query = DB::select('n.*', ['d.name', 'district_name'], ['t.name', 'type_name'])
			->from(['notice', 'n'])
			->join(['districts', 'd'], 'left')
			->on('d.id', '=', 'n.district')
			->join(['notice__type', 't'], 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->and_where('n.price', '>=', $priceFrom)
		;

		$query = !empty($district) ? $query->and_where('d.id', '=', $district) : $query;
		$query = !empty($type) ? $query->and_where('t.id', '=', $type) : $query;
		$query = !empty($priceTo) ? $query->and_where('n.price', '<=', $priceTo) : $query;

		$queryCount = clone $query;

		$query = $query
			->offset((($page - 1) * $limit))
			->limit(($page * $limit))
		;

		switch ($order) {
			case 'priceUp':
				$query = $query->order_by('n.price', 'ASC');

				break;
			case 'priceDown':
				$query = $query->order_by('n.price', 'DESC');

				break;
			default:
				$query = $query->order_by('n.id', 'DESC');
		}

		$res = $query
			->execute()
			->as_array()
		;

		$i = 0;
		$rowsCount = $queryCount->execute()->count();

		foreach ($res as $row) {
			$notices[$i] = $row;
			$notices[$i]['imgs'] = $this->getNoticeImg($row['id']);
			$notices[$i]['paginationCount'] = ceil($rowsCount / count($res));
			$notices[$i]['count'] = $rowsCount;

			$i++;
		}

		return $notices;
	}

    /**
     * @return array
     */
	public function findNoticesIndexTop()
	{
		$notices = [];

        $res = DB::select('n.*', ['d.name', 'district_name'], ['t.name', 'type_name'])
			->from(['notice', 'n'])
			->join(['districts', 'd'], 'left')
			->on('d.id', '=', 'n.district')
			->join(['notice__type', 't'], 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->and_where('n.index_top', '=', 1)
			->execute()
			->as_array()
		;

		$i = 0;

		foreach ($res as $row) {
			$notices[$i] = $row;
            $noticeImgs = $this->getNoticeImg($row['id']);
			$notices[$i]['imgs'] = $imgSrc = count($noticeImgs) === 0 ? [0 => ['src' => 'nopic.jpg']] : $noticeImgs;

			$i++;
		}

		return $notices;
	}

    /**
     * @param $id
     */
	public function showOnIndexTop($id)
    {
        DB::update('notice')
            ->set(['index_top' => 1])
            ->where('id', '=', $id)
            ->execute()
        ;
    }

    /**
     * @param $id
     */
	public function hideOnIndexTop($id)
    {
        DB::update('notice')
            ->set(['index_top' => 0])
            ->where('id', '=', $id)
            ->execute()
        ;
    }

    /**
     * @return array
     */
	public function findNoticesIndexBottom()
	{
		$notices = [];

        $res = DB::select('n.*', ['d.name', 'district_name'], ['t.name', 'type_name'])
			->from(['notice', 'n'])
			->join(['districts', 'd'], 'left')
			->on('d.id', '=', 'n.district')
			->join(['notice__type', 't'], 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->and_where('n.index_bottom', '=', 1)
			->execute()
			->as_array()
		;

		$i = 0;

		foreach ($res as $row) {
			$notices[$i] = $row;
            $noticeImgs = $this->getNoticeImg($row['id']);
			$notices[$i]['imgs'] = $imgSrc = count($noticeImgs) === 0 ? [0 => ['src' => 'nopic.jpg']] : $noticeImgs;

			$i++;
		}

		return $notices;
	}

    /**
     * @param $id
     */
	public function showOnIndexBottom($id)
    {
        DB::update('notice')
            ->set(['index_bottom' => 1])
            ->where('id', '=', $id)
            ->execute()
        ;
    }

    /**
     * @param $id
     */
	public function hideOnIndexBottom($id)
    {
        DB::update('notice')
            ->set(['index_bottom' => 0])
            ->where('id', '=', $id)
            ->execute()
        ;
    }
}
?>
