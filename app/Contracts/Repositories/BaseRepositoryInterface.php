<?php

namespace App\Contracts\Repositories;

use Closure;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * @method $this setPresenter($presenter)
 * @method array getFieldsSearchable()
 * @method $this scopeQuery(Closure $scope)
 * @method Collection|array lists(string $column, string|null $key = null)
 * @method Collection|array pluck(string $column, string|null $key = null)
 * @method mixed sync($id, $relation, $attributes, bool $detaching = true)
 * @method mixed syncWithoutDetaching($id, $relation, $attributes)
 * @method mixed all(array $columns = ['*'])
 * @method int count(array $where = [], string $columns = '*')
 * @method mixed get(array $columns = ['*'])
 * @method mixed first(array $columns = ['*'])
 * @method mixed firstOrNew(array $attributes = [])
 * @method mixed firstOrCreate(array $attributes = [])
 * @method mixed limit(int $limit, array $columns = ['*'])
 * @method mixed paginate(int|null $limit = null, array $columns = ['*'], string $method = "paginate")
 * @method mixed simplePaginate(int|null $limit = null, array $columns = ['*'])
 * @method mixed find(int $id, array $columns = ['*'])
 * @method mixed findByField(string $field, mixed $value, array $columns = ['*'])
 * @method mixed findWhere(array $where, array $columns = ['*'])
 * @method mixed findWhereIn(string $field, array $values, array $columns = ['*'])
 * @method mixed findWhereNotIn(string $field, array $values, array $columns = ['*'])
 * @method mixed findWhereBetween(string $field, array $values, array $columns = ['*'])
 *
 * @method mixed create(array $attributes)
 * @method mixed update(array $attributes, int $id)
 * @method mixed updateOrCreate(array $attributes, array $values = [])
 * @method int delete(int $id)
 * @method int deleteWhere(array $where)
 *
 * @method BaseRepository with(array|string $relations)
 * @method BaseRepository withCount(mixed $relations)
 * @method BaseRepository whereHas(string $relation, Closure $closure)
 * @method BaseRepository hidden(array $fields)
 * @method BaseRepository visible(array $fields)
 * @method BaseRepository orderBy(string $column, string $direction = 'asc')
 * @method BaseRepository take(int $limit)
 * @method BaseRepository skipPresenter(bool $status = true)
 * @method BaseRepository skipCriteria(bool $status = true)
 */
interface BaseRepositoryInterface
{
}
