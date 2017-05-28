<?php
namespace App\Services;

class Slug
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    private $entity;
    private $dbField;



    public function __construct($entity = \App\Product::class, $dbField = 'slug')
    {
        $this->entity = $entity;
        $this->dbField = $dbField;

    }
    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {

            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {

            $newSlug = $slug . '-' . $i;

            if (!$allSlugs->contains('slug', $newSlug)) {

                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {

        return call_user_func(array($this->entity, 'select'), $this->dbField)->where($this->dbField, 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();

    }


    //  invoking for default (e.g. \App\Post)
    //  $slugLibrary = new \App\Services\Slug();

    //  invoking for custom entity
    //  $slugLibrary = new \App\Services\Slug(\App\Person::class);

    //  usage
    //  $slug = $slugLibrary->createSlug('George Lucas');
}