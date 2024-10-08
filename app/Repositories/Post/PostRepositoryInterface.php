<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface {
    public function all();
    public function getPosts($limit, $q);
    public function getPostByUserId($userId);
    public function find($id);
    public function getLastPost($limit = null, $id = null);
    public function mostViewedPost($limit = null, $id = null);
    public function postRand($limit = null, $id = null);
    public function countPost($status, $author_id, $col, $notStatus);
    public function postByCategory($categoryName, $table, $limit = null, $id = null);
    public function postByCategorySlug($slug, $table, $limit = null, $id = null);
    public function postByCategorySlugPaginate($slug, $table, $limit = null, $id = null);
    public function topPostView($limit, $author_id);
    public function topCategoriesByPostViews($limit, $author_id = null);
    public function topSubcategoriesByPostViews($limit, $author_id);
    public function getPendingPost();
    public function postBySlug($slug);
    public function postIncrement($col, $id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}