<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (C) 2009-2017 IonizeCMS Team <team@ionizecms.com>
 *
 * Permission is hereby granted,  free of charge,  to any person  obtaining a copy
 * of this software  and associated documentation files  (the "Software"), to deal
 * in the Software  without restriction,  including without limitation  the rights
 * to use,  copy,  modify,  merge,  publish,  distribute,  sublicense, and/or sell
 * copies  of  the  Software, and to  permit  persons  to  whom  the  Software  is
 * furnished to do so, subject to the following conditions:
 *
 * The above  copyright notice  and this  permission  notice  shall be included in
 * all copies  or substantial  portions of the Software.
 *
 * In the case the  software is used  by a  company for its own clients, it is not
 * permitted to  suggest that the  software is the  property of  the company or to
 * suggest  that the  software has  been created  and  developed by any other team
 * than the copyright holder.
 *
 * THE SOFTWARE  IS PROVIDED  "AS IS",  WITHOUT WARRANTY  OF ANY KIND,  EXPRESS OR
 * IMPLIED,  INCLUDING  BUT NOT  LIMITED TO  THE  WARRANTIES  OF  MERCHANTABILITY,
 * FITNESS FOR A  PARTICULAR  PURPOSE AND  NONINFINGEMENT.  IN NO  EVENT SHALL THE
 * AUTHORS  OR COPYRIGHT  HOLDERS  BE  LIABLE  FOR  ANY CLAIM,  DAMAGES  OR  OTHER
 * LIABILITY,  WHETHER IN AN  ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR  IN CONNECTION  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

namespace Ionize\Illuminate\Database;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use PDOStatement;
use Generator;
use Closure;

/**
 * Database Model
 *
 * it's adding proper PHPDoc for Laravel's EloquentModel
 *
 * @package Ionize\Illuminate\Database
 * @author: Ádám Liszkai <adaliszk@gmail.com>
 * @since: v2.0.0
 *
 * @inheritdoc
 *
 * @method static Builder table( string $table )
 * Begin a fluent query against a database table.
 *
 * @method static Builder query()
 * Get a new query builder instance.
 *
 * @method static Builder where( string $name, string $expression, string $value = null )
 *
 * @method static mixed selectOne(string $query, array $bindings = [], bool $useReadPdo = true)
 * Run a select statement and return a single result.
 *
 * @method static array selectFromWriteConnection(string $query, array $bindings = [])
 * Run a select statement against the database.
 *
 * @method static array select(string $query, array $bindings = [], bool $useReadPdo = true)
 * Run a select statement against the database.
 *
 * @method static Generator cursor(string $query, array $bindings = [], bool $useReadPdo = true)
 * Run a select statement against the database and returns a generator.
 *
 * @method static bool insert(string $query, array $bindings = [])
 * Run an insert statement against the database.
 *
 * @method static bool statement(string $query, array $bindings = [])
 * Execute an SQL statement and return the boolean result.
 *
 * @method static int affectingStatement(string $query, array $bindings = [])
 * Run an SQL statement and get the number of rows affected.
 *
 * @method static bool unprepared(string $query)
 * Run a raw, unprepared query against the PDO connection.
 *
 * @method static array pretend(Closure $callback)
 * Execute the given callback in "dry run" mode.
 *
 * @method static void bindValues(PDOStatement $statement, array $bindings)
 * Bind values to their parameters in the given statement.
 *
 * @method static array prepareBindings(array $bindings)
 * Prepare the query bindings for execution.
 */
abstract class Model extends EloquentModel
{

}
/* End of file Model.php */
/* Location: Ionize\Illuminate\Database */
