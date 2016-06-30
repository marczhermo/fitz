<?php namespace Fitz\Databases;

use Fitz\Abstracts\ModelInterface;
use Fitz\Exceptions\ModelException;

class PgSQLModel implements ModelInterface
{

    private function pgQuery($sql)
    {
        $result = @pg_query(PgSQL::Connection(), $sql);
        if ( ! $result) {
            throw new ModelException(pg_last_error(PgSQL::Connection()));
        }

        return $result;
    }

    public function query($sql)
    {
        return pg_result_status($this->pgQuery($sql));
    }

    public function fetchArray($sql)
    {
        $results = array();
        $res = $this->pgQuery($sql);
        while ($row = pg_fetch_array($res, null, PGSQL_ASSOC)) {
            $results[] = $row;
        }

        return $results;
    }
}