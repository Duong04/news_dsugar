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
    public function countPost($status, $col = null);
    public function postByCategory($categoryName, $table, $limit = null, $id = null);
    public function postByCategorySlug($slug, $table, $limit = null, $id = null);
    public function postByCategorySlugPaginate($slug, $table, $limit = null, $id = null);
    public function topPostView($limit);
    public function topCategoriesByPostViews($limit, $user_id = null);
    public function topSubcategoriesByPostViews($limit);
    public function getPendingPost();
    public function postBySlug($slug);
    public function postIncrement($col, $id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}