<?php

/**
 * Class Model_Content
 */
class Model_Content extends Kohana_Model
{
    private $contactTypes = ['address' => 'Адрес', 'phone' => 'Телефон', 'email' => 'E-mail'];

    /**
     * @return array
     */
    public function getContactTypes()
    {
        return $this->contactTypes;
    }

    /**
     * @return View
     */
    public function getBaseTemplate()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        return View::factory('template')
            ->set('menu', $this->getMenu())
            ->set('categories', $this->getCategory())
            ->set('noticeTopMenuTypes', $noticeModel->findTopMenuTypes())
            ->set('noticeTypes', $noticeModel->findAllTypes())
            ;
    }
    
    /**
     * @param null|int $mid
     * @param null|int $id
     * 
     * @return array
     */
    public function getMenu($mid = null, $id = null)
    {
        if ($mid !== null && $id === null) {
            return DB::select(
                    'm.*' , 
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.parent_id', '=', $mid)
                ->and_where('m.status_id', '=', 1)
                ->execute()
                ->as_array()
            ;
        } elseif ($id !== null) {
            return DB::select(
                    'm.*' ,
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.id', '=', $id)
                ->execute()
                ->as_array()
            ;
        } else {
            return DB::select(
                    'm.*' ,
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.parent_id', 'IS', null)
                ->and_where('m.status_id', '=', 1)
                ->execute()
                ->as_array()
            ;
        }
    }

    /**
     * @param null|int $cid
     * @param null|int $id
     * 
     * @return array
     */
    public function getCategory($cid = null, $id = null)
    {
        if ($cid !== null && $id === null) {
            return DB::select()
                ->from('category')
                ->where('parent_id', '=', $cid)
                ->execute()
                ->as_array()
            ;
        } elseif ($id !== null) {
            return DB::select()
                ->from('category')
                ->where('id', '=', $id)
                ->limit(1)
                ->execute()
                ->current()
            ;
        } else {
            return DB::select()
                ->from('category')
                ->where('parent_id', 'IS', NULL)
                ->execute()
                ->as_array()
            ;
        }
    }

    /**
     * @return array
     */
    public function getPages()
    {
        return DB::select('p.*')
            ->from(['pages', 'p'])
            ->join(['menu', 'm'])
            ->on('m.page_id', '=', 'p.id')
            ->where('m.status_id', '=', 1)
            ->execute()
            ->as_array()
        ;
    }

    public function getPage($params = [])
    {
        $id = Arr::get($params, 'id', 0);

        return DB::select()
            ->from('pages')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param string $slug
     * 
     * @return false|array
     */
    public function findPageBySlug($slug = '')
    {
        return DB::select()
            ->from('pages')
            ->where('slug', '=', $slug)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param int $id
     *
     * @return false|array
     */
    public function findPageById($id)
    {
        return DB::select()
            ->from('pages')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    public function findAllDistricts()
    {
        return DB::select()
            ->from('districts')
            ->execute()
            ->as_array('id', 'name')
        ;
    }

    public function findAllStreets()
    {
        return DB::select()
            ->from('streets')
            ->execute()
            ->as_array(null, 'name')
        ;
    }

    public function findStreets($query)
    {
        if (empty($query)) {
            return [];
        }

        return DB::select()
            ->from('streets')
            ->where('name', 'like', "%$query%")
            ->execute()
            ->as_array(null, 'name')
        ;
    }

    /**
     * @param null|array $type
     * @return array
     */
    public function getContacts($type = null)
    {
        $query = DB::select()
            ->from('contacts')
            ->where('', '', 1)
        ;

        $query = $type !== null ? $query->and_where('type', 'IN', $type) : $query;

        return $query->execute()->as_array();
    }

    /**
     * @param string $type
     * @param string $value
     *
     * @return bool
     */
    public function addContact($type, $value)
    {
        if (!array_key_exists($type, $this->getContactTypes())) {
            return false;
        }

        DB::insert('contacts', ['type', 'value'])
            ->values([$type, $value])
            ->execute()
        ;

        return true;
    }

    /**
     * @param array $params
     */
    public function updateContacts($params)
    {
        $ids = Arr::get($params, 'ids', []);
        $types = Arr::get($params, 'types', []);
        $values = Arr::get($params, 'values', []);

        foreach ($ids as $key => $id) {
            DB::update('contacts')
                ->set(['type' => $types[$key], 'value' => $values[$key]])
                ->where('id', '=', $id)
                ->execute()
            ;
        }
    }

    /**
     * @param int $id
     */
    public function removeContact($id)
    {
        DB::delete('contacts')
            ->where('id', '=', $id)
            ->execute()
        ;
    }

    /**
     * @param null|array $type
     * @return array
     */
    public function getSocialNetworks($type = null)
    {
        $query = DB::select()
            ->from('social_networks')
            ->where('', '', 1)
        ;

        $query = $type !== null ? $query->and_where('type', '=', $type) : $query;
        $query = $type !== null ? $query->limit(1) : $query;

        return $query = $type !== null ? $query->execute()->current() : $query->execute()->as_array();
    }

    /**
     * @param array $params
     */
    public function updateSocialNetworks($params)
    {
        $ids = Arr::get($params, 'ids', []);
        $values = Arr::get($params, 'values', []);

        foreach ($ids as $key => $id) {
            DB::update('social_networks')
                ->set(['value' => $values[$key]])
                ->where('id', '=', $id)
                ->execute()
            ;
        }
    }
}