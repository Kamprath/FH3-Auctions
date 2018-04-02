<?php namespace App\Repositories;

use Illuminate\Support\Collection;

interface RepositoryInterface
{
    /**
     * @return Collection
     */
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id);

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id);
}
