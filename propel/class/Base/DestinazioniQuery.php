<?php

namespace Base;

use \Destinazioni as ChildDestinazioni;
use \DestinazioniQuery as ChildDestinazioniQuery;
use \Exception;
use \PDO;
use Map\DestinazioniTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'destinazioni' table.
 *
 *
 *
 * @method     ChildDestinazioniQuery orderByIddestinazione($order = Criteria::ASC) Order by the iddestinazione column
 * @method     ChildDestinazioniQuery orderByStreamServer($order = Criteria::ASC) Order by the stream_server column
 * @method     ChildDestinazioniQuery orderByKeyServer($order = Criteria::ASC) Order by the key_server column
 * @method     ChildDestinazioniQuery orderByParametri($order = Criteria::ASC) Order by the parametri column
 * @method     ChildDestinazioniQuery orderByNome($order = Criteria::ASC) Order by the nome column
 *
 * @method     ChildDestinazioniQuery groupByIddestinazione() Group by the iddestinazione column
 * @method     ChildDestinazioniQuery groupByStreamServer() Group by the stream_server column
 * @method     ChildDestinazioniQuery groupByKeyServer() Group by the key_server column
 * @method     ChildDestinazioniQuery groupByParametri() Group by the parametri column
 * @method     ChildDestinazioniQuery groupByNome() Group by the nome column
 *
 * @method     ChildDestinazioniQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDestinazioniQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDestinazioniQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDestinazioniQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDestinazioniQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDestinazioniQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDestinazioni findOne(ConnectionInterface $con = null) Return the first ChildDestinazioni matching the query
 * @method     ChildDestinazioni findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDestinazioni matching the query, or a new ChildDestinazioni object populated from the query conditions when no match is found
 *
 * @method     ChildDestinazioni findOneByIddestinazione(int $iddestinazione) Return the first ChildDestinazioni filtered by the iddestinazione column
 * @method     ChildDestinazioni findOneByStreamServer(string $stream_server) Return the first ChildDestinazioni filtered by the stream_server column
 * @method     ChildDestinazioni findOneByKeyServer(string $key_server) Return the first ChildDestinazioni filtered by the key_server column
 * @method     ChildDestinazioni findOneByParametri(string $parametri) Return the first ChildDestinazioni filtered by the parametri column
 * @method     ChildDestinazioni findOneByNome(string $nome) Return the first ChildDestinazioni filtered by the nome column *

 * @method     ChildDestinazioni requirePk($key, ConnectionInterface $con = null) Return the ChildDestinazioni by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDestinazioni requireOne(ConnectionInterface $con = null) Return the first ChildDestinazioni matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDestinazioni requireOneByIddestinazione(int $iddestinazione) Return the first ChildDestinazioni filtered by the iddestinazione column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDestinazioni requireOneByStreamServer(string $stream_server) Return the first ChildDestinazioni filtered by the stream_server column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDestinazioni requireOneByKeyServer(string $key_server) Return the first ChildDestinazioni filtered by the key_server column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDestinazioni requireOneByParametri(string $parametri) Return the first ChildDestinazioni filtered by the parametri column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDestinazioni requireOneByNome(string $nome) Return the first ChildDestinazioni filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDestinazioni[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDestinazioni objects based on current ModelCriteria
 * @method     ChildDestinazioni[]|ObjectCollection findByIddestinazione(int $iddestinazione) Return ChildDestinazioni objects filtered by the iddestinazione column
 * @method     ChildDestinazioni[]|ObjectCollection findByStreamServer(string $stream_server) Return ChildDestinazioni objects filtered by the stream_server column
 * @method     ChildDestinazioni[]|ObjectCollection findByKeyServer(string $key_server) Return ChildDestinazioni objects filtered by the key_server column
 * @method     ChildDestinazioni[]|ObjectCollection findByParametri(string $parametri) Return ChildDestinazioni objects filtered by the parametri column
 * @method     ChildDestinazioni[]|ObjectCollection findByNome(string $nome) Return ChildDestinazioni objects filtered by the nome column
 * @method     ChildDestinazioni[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DestinazioniQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DestinazioniQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Destinazioni', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDestinazioniQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDestinazioniQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDestinazioniQuery) {
            return $criteria;
        }
        $query = new ChildDestinazioniQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDestinazioni|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DestinazioniTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DestinazioniTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDestinazioni A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT iddestinazione, stream_server, key_server, parametri, nome FROM destinazioni WHERE iddestinazione = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDestinazioni $obj */
            $obj = new ChildDestinazioni();
            $obj->hydrate($row);
            DestinazioniTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDestinazioni|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the iddestinazione column
     *
     * Example usage:
     * <code>
     * $query->filterByIddestinazione(1234); // WHERE iddestinazione = 1234
     * $query->filterByIddestinazione(array(12, 34)); // WHERE iddestinazione IN (12, 34)
     * $query->filterByIddestinazione(array('min' => 12)); // WHERE iddestinazione > 12
     * </code>
     *
     * @param     mixed $iddestinazione The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByIddestinazione($iddestinazione = null, $comparison = null)
    {
        if (is_array($iddestinazione)) {
            $useMinMax = false;
            if (isset($iddestinazione['min'])) {
                $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $iddestinazione['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddestinazione['max'])) {
                $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $iddestinazione['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $iddestinazione, $comparison);
    }

    /**
     * Filter the query on the stream_server column
     *
     * Example usage:
     * <code>
     * $query->filterByStreamServer('fooValue');   // WHERE stream_server = 'fooValue'
     * $query->filterByStreamServer('%fooValue%'); // WHERE stream_server LIKE '%fooValue%'
     * </code>
     *
     * @param     string $streamServer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByStreamServer($streamServer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($streamServer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $streamServer)) {
                $streamServer = str_replace('*', '%', $streamServer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DestinazioniTableMap::COL_STREAM_SERVER, $streamServer, $comparison);
    }

    /**
     * Filter the query on the key_server column
     *
     * Example usage:
     * <code>
     * $query->filterByKeyServer('fooValue');   // WHERE key_server = 'fooValue'
     * $query->filterByKeyServer('%fooValue%'); // WHERE key_server LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keyServer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByKeyServer($keyServer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keyServer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keyServer)) {
                $keyServer = str_replace('*', '%', $keyServer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DestinazioniTableMap::COL_KEY_SERVER, $keyServer, $comparison);
    }

    /**
     * Filter the query on the parametri column
     *
     * Example usage:
     * <code>
     * $query->filterByParametri('fooValue');   // WHERE parametri = 'fooValue'
     * $query->filterByParametri('%fooValue%'); // WHERE parametri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $parametri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByParametri($parametri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($parametri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $parametri)) {
                $parametri = str_replace('*', '%', $parametri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DestinazioniTableMap::COL_PARAMETRI, $parametri, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nome)) {
                $nome = str_replace('*', '%', $nome);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DestinazioniTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDestinazioni $destinazioni Object to remove from the list of results
     *
     * @return $this|ChildDestinazioniQuery The current query, for fluid interface
     */
    public function prune($destinazioni = null)
    {
        if ($destinazioni) {
            $this->addUsingAlias(DestinazioniTableMap::COL_IDDESTINAZIONE, $destinazioni->getIddestinazione(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the destinazioni table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DestinazioniTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DestinazioniTableMap::clearInstancePool();
            DestinazioniTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DestinazioniTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DestinazioniTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DestinazioniTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DestinazioniTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DestinazioniQuery
