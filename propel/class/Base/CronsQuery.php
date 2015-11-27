<?php

namespace Base;

use \Crons as ChildCrons;
use \CronsQuery as ChildCronsQuery;
use \Exception;
use \PDO;
use Map\CronsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'crons' table.
 *
 *
 *
 * @method     ChildCronsQuery orderByIdcron($order = Criteria::ASC) Order by the idcron column
 * @method     ChildCronsQuery orderByMinuto($order = Criteria::ASC) Order by the minuto column
 * @method     ChildCronsQuery orderByOra($order = Criteria::ASC) Order by the ora column
 * @method     ChildCronsQuery orderByGiornoDelMese($order = Criteria::ASC) Order by the giorno_del_mese column
 * @method     ChildCronsQuery orderByMese($order = Criteria::ASC) Order by the mese column
 * @method     ChildCronsQuery orderByGiornoDellaSettimana($order = Criteria::ASC) Order by the giorno_della_settimana column
 * @method     ChildCronsQuery orderByComando($order = Criteria::ASC) Order by the comando column
 * @method     ChildCronsQuery orderByVideosHasDestinazioniIdvideosHasDestinazioni($order = Criteria::ASC) Order by the videos_has_destinazioni_idvideos_has_destinazioni column
 * @method     ChildCronsQuery orderByNextDate($order = Criteria::ASC) Order by the next_date column
 * @method     ChildCronsQuery orderByNextTime($order = Criteria::ASC) Order by the next_time column
 * @method     ChildCronsQuery orderByInviato($order = Criteria::ASC) Order by the inviato column
 *
 * @method     ChildCronsQuery groupByIdcron() Group by the idcron column
 * @method     ChildCronsQuery groupByMinuto() Group by the minuto column
 * @method     ChildCronsQuery groupByOra() Group by the ora column
 * @method     ChildCronsQuery groupByGiornoDelMese() Group by the giorno_del_mese column
 * @method     ChildCronsQuery groupByMese() Group by the mese column
 * @method     ChildCronsQuery groupByGiornoDellaSettimana() Group by the giorno_della_settimana column
 * @method     ChildCronsQuery groupByComando() Group by the comando column
 * @method     ChildCronsQuery groupByVideosHasDestinazioniIdvideosHasDestinazioni() Group by the videos_has_destinazioni_idvideos_has_destinazioni column
 * @method     ChildCronsQuery groupByNextDate() Group by the next_date column
 * @method     ChildCronsQuery groupByNextTime() Group by the next_time column
 * @method     ChildCronsQuery groupByInviato() Group by the inviato column
 *
 * @method     ChildCronsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCronsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCronsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCronsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCronsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCronsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCrons findOne(ConnectionInterface $con = null) Return the first ChildCrons matching the query
 * @method     ChildCrons findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCrons matching the query, or a new ChildCrons object populated from the query conditions when no match is found
 *
 * @method     ChildCrons findOneByIdcron(int $idcron) Return the first ChildCrons filtered by the idcron column
 * @method     ChildCrons findOneByMinuto(string $minuto) Return the first ChildCrons filtered by the minuto column
 * @method     ChildCrons findOneByOra(string $ora) Return the first ChildCrons filtered by the ora column
 * @method     ChildCrons findOneByGiornoDelMese(string $giorno_del_mese) Return the first ChildCrons filtered by the giorno_del_mese column
 * @method     ChildCrons findOneByMese(string $mese) Return the first ChildCrons filtered by the mese column
 * @method     ChildCrons findOneByGiornoDellaSettimana(string $giorno_della_settimana) Return the first ChildCrons filtered by the giorno_della_settimana column
 * @method     ChildCrons findOneByComando(string $comando) Return the first ChildCrons filtered by the comando column
 * @method     ChildCrons findOneByVideosHasDestinazioniIdvideosHasDestinazioni(int $videos_has_destinazioni_idvideos_has_destinazioni) Return the first ChildCrons filtered by the videos_has_destinazioni_idvideos_has_destinazioni column
 * @method     ChildCrons findOneByNextDate(string $next_date) Return the first ChildCrons filtered by the next_date column
 * @method     ChildCrons findOneByNextTime(string $next_time) Return the first ChildCrons filtered by the next_time column
 * @method     ChildCrons findOneByInviato(string $inviato) Return the first ChildCrons filtered by the inviato column *

 * @method     ChildCrons requirePk($key, ConnectionInterface $con = null) Return the ChildCrons by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOne(ConnectionInterface $con = null) Return the first ChildCrons matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCrons requireOneByIdcron(int $idcron) Return the first ChildCrons filtered by the idcron column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByMinuto(string $minuto) Return the first ChildCrons filtered by the minuto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByOra(string $ora) Return the first ChildCrons filtered by the ora column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByGiornoDelMese(string $giorno_del_mese) Return the first ChildCrons filtered by the giorno_del_mese column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByMese(string $mese) Return the first ChildCrons filtered by the mese column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByGiornoDellaSettimana(string $giorno_della_settimana) Return the first ChildCrons filtered by the giorno_della_settimana column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByComando(string $comando) Return the first ChildCrons filtered by the comando column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByVideosHasDestinazioniIdvideosHasDestinazioni(int $videos_has_destinazioni_idvideos_has_destinazioni) Return the first ChildCrons filtered by the videos_has_destinazioni_idvideos_has_destinazioni column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByNextDate(string $next_date) Return the first ChildCrons filtered by the next_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByNextTime(string $next_time) Return the first ChildCrons filtered by the next_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCrons requireOneByInviato(string $inviato) Return the first ChildCrons filtered by the inviato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCrons[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCrons objects based on current ModelCriteria
 * @method     ChildCrons[]|ObjectCollection findByIdcron(int $idcron) Return ChildCrons objects filtered by the idcron column
 * @method     ChildCrons[]|ObjectCollection findByMinuto(string $minuto) Return ChildCrons objects filtered by the minuto column
 * @method     ChildCrons[]|ObjectCollection findByOra(string $ora) Return ChildCrons objects filtered by the ora column
 * @method     ChildCrons[]|ObjectCollection findByGiornoDelMese(string $giorno_del_mese) Return ChildCrons objects filtered by the giorno_del_mese column
 * @method     ChildCrons[]|ObjectCollection findByMese(string $mese) Return ChildCrons objects filtered by the mese column
 * @method     ChildCrons[]|ObjectCollection findByGiornoDellaSettimana(string $giorno_della_settimana) Return ChildCrons objects filtered by the giorno_della_settimana column
 * @method     ChildCrons[]|ObjectCollection findByComando(string $comando) Return ChildCrons objects filtered by the comando column
 * @method     ChildCrons[]|ObjectCollection findByVideosHasDestinazioniIdvideosHasDestinazioni(int $videos_has_destinazioni_idvideos_has_destinazioni) Return ChildCrons objects filtered by the videos_has_destinazioni_idvideos_has_destinazioni column
 * @method     ChildCrons[]|ObjectCollection findByNextDate(string $next_date) Return ChildCrons objects filtered by the next_date column
 * @method     ChildCrons[]|ObjectCollection findByNextTime(string $next_time) Return ChildCrons objects filtered by the next_time column
 * @method     ChildCrons[]|ObjectCollection findByInviato(string $inviato) Return ChildCrons objects filtered by the inviato column
 * @method     ChildCrons[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CronsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CronsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Crons', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCronsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCronsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCronsQuery) {
            return $criteria;
        }
        $query = new ChildCronsQuery();
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
     * @return ChildCrons|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CronsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CronsTableMap::DATABASE_NAME);
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
     * @return ChildCrons A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idcron, minuto, ora, giorno_del_mese, mese, giorno_della_settimana, comando, videos_has_destinazioni_idvideos_has_destinazioni, next_date, next_time, inviato FROM crons WHERE idcron = :p0';
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
            /** @var ChildCrons $obj */
            $obj = new ChildCrons();
            $obj->hydrate($row);
            CronsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCrons|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CronsTableMap::COL_IDCRON, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CronsTableMap::COL_IDCRON, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idcron column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcron(1234); // WHERE idcron = 1234
     * $query->filterByIdcron(array(12, 34)); // WHERE idcron IN (12, 34)
     * $query->filterByIdcron(array('min' => 12)); // WHERE idcron > 12
     * </code>
     *
     * @param     mixed $idcron The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByIdcron($idcron = null, $comparison = null)
    {
        if (is_array($idcron)) {
            $useMinMax = false;
            if (isset($idcron['min'])) {
                $this->addUsingAlias(CronsTableMap::COL_IDCRON, $idcron['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcron['max'])) {
                $this->addUsingAlias(CronsTableMap::COL_IDCRON, $idcron['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_IDCRON, $idcron, $comparison);
    }

    /**
     * Filter the query on the minuto column
     *
     * Example usage:
     * <code>
     * $query->filterByMinuto('fooValue');   // WHERE minuto = 'fooValue'
     * $query->filterByMinuto('%fooValue%'); // WHERE minuto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $minuto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByMinuto($minuto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($minuto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $minuto)) {
                $minuto = str_replace('*', '%', $minuto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_MINUTO, $minuto, $comparison);
    }

    /**
     * Filter the query on the ora column
     *
     * Example usage:
     * <code>
     * $query->filterByOra('fooValue');   // WHERE ora = 'fooValue'
     * $query->filterByOra('%fooValue%'); // WHERE ora LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ora The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByOra($ora = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ora)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ora)) {
                $ora = str_replace('*', '%', $ora);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_ORA, $ora, $comparison);
    }

    /**
     * Filter the query on the giorno_del_mese column
     *
     * Example usage:
     * <code>
     * $query->filterByGiornoDelMese('fooValue');   // WHERE giorno_del_mese = 'fooValue'
     * $query->filterByGiornoDelMese('%fooValue%'); // WHERE giorno_del_mese LIKE '%fooValue%'
     * </code>
     *
     * @param     string $giornoDelMese The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByGiornoDelMese($giornoDelMese = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($giornoDelMese)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $giornoDelMese)) {
                $giornoDelMese = str_replace('*', '%', $giornoDelMese);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_GIORNO_DEL_MESE, $giornoDelMese, $comparison);
    }

    /**
     * Filter the query on the mese column
     *
     * Example usage:
     * <code>
     * $query->filterByMese('fooValue');   // WHERE mese = 'fooValue'
     * $query->filterByMese('%fooValue%'); // WHERE mese LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mese The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByMese($mese = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mese)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mese)) {
                $mese = str_replace('*', '%', $mese);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_MESE, $mese, $comparison);
    }

    /**
     * Filter the query on the giorno_della_settimana column
     *
     * Example usage:
     * <code>
     * $query->filterByGiornoDellaSettimana('fooValue');   // WHERE giorno_della_settimana = 'fooValue'
     * $query->filterByGiornoDellaSettimana('%fooValue%'); // WHERE giorno_della_settimana LIKE '%fooValue%'
     * </code>
     *
     * @param     string $giornoDellaSettimana The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByGiornoDellaSettimana($giornoDellaSettimana = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($giornoDellaSettimana)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $giornoDellaSettimana)) {
                $giornoDellaSettimana = str_replace('*', '%', $giornoDellaSettimana);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_GIORNO_DELLA_SETTIMANA, $giornoDellaSettimana, $comparison);
    }

    /**
     * Filter the query on the comando column
     *
     * Example usage:
     * <code>
     * $query->filterByComando('fooValue');   // WHERE comando = 'fooValue'
     * $query->filterByComando('%fooValue%'); // WHERE comando LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comando The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByComando($comando = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comando)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comando)) {
                $comando = str_replace('*', '%', $comando);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_COMANDO, $comando, $comparison);
    }

    /**
     * Filter the query on the videos_has_destinazioni_idvideos_has_destinazioni column
     *
     * Example usage:
     * <code>
     * $query->filterByVideosHasDestinazioniIdvideosHasDestinazioni(1234); // WHERE videos_has_destinazioni_idvideos_has_destinazioni = 1234
     * $query->filterByVideosHasDestinazioniIdvideosHasDestinazioni(array(12, 34)); // WHERE videos_has_destinazioni_idvideos_has_destinazioni IN (12, 34)
     * $query->filterByVideosHasDestinazioniIdvideosHasDestinazioni(array('min' => 12)); // WHERE videos_has_destinazioni_idvideos_has_destinazioni > 12
     * </code>
     *
     * @param     mixed $videosHasDestinazioniIdvideosHasDestinazioni The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByVideosHasDestinazioniIdvideosHasDestinazioni($videosHasDestinazioniIdvideosHasDestinazioni = null, $comparison = null)
    {
        if (is_array($videosHasDestinazioniIdvideosHasDestinazioni)) {
            $useMinMax = false;
            if (isset($videosHasDestinazioniIdvideosHasDestinazioni['min'])) {
                $this->addUsingAlias(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI, $videosHasDestinazioniIdvideosHasDestinazioni['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($videosHasDestinazioniIdvideosHasDestinazioni['max'])) {
                $this->addUsingAlias(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI, $videosHasDestinazioniIdvideosHasDestinazioni['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI, $videosHasDestinazioniIdvideosHasDestinazioni, $comparison);
    }

    /**
     * Filter the query on the next_date column
     *
     * Example usage:
     * <code>
     * $query->filterByNextDate('2011-03-14'); // WHERE next_date = '2011-03-14'
     * $query->filterByNextDate('now'); // WHERE next_date = '2011-03-14'
     * $query->filterByNextDate(array('max' => 'yesterday')); // WHERE next_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $nextDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByNextDate($nextDate = null, $comparison = null)
    {
        if (is_array($nextDate)) {
            $useMinMax = false;
            if (isset($nextDate['min'])) {
                $this->addUsingAlias(CronsTableMap::COL_NEXT_DATE, $nextDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nextDate['max'])) {
                $this->addUsingAlias(CronsTableMap::COL_NEXT_DATE, $nextDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_NEXT_DATE, $nextDate, $comparison);
    }

    /**
     * Filter the query on the next_time column
     *
     * Example usage:
     * <code>
     * $query->filterByNextTime('2011-03-14'); // WHERE next_time = '2011-03-14'
     * $query->filterByNextTime('now'); // WHERE next_time = '2011-03-14'
     * $query->filterByNextTime(array('max' => 'yesterday')); // WHERE next_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $nextTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByNextTime($nextTime = null, $comparison = null)
    {
        if (is_array($nextTime)) {
            $useMinMax = false;
            if (isset($nextTime['min'])) {
                $this->addUsingAlias(CronsTableMap::COL_NEXT_TIME, $nextTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nextTime['max'])) {
                $this->addUsingAlias(CronsTableMap::COL_NEXT_TIME, $nextTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_NEXT_TIME, $nextTime, $comparison);
    }

    /**
     * Filter the query on the inviato column
     *
     * Example usage:
     * <code>
     * $query->filterByInviato('fooValue');   // WHERE inviato = 'fooValue'
     * $query->filterByInviato('%fooValue%'); // WHERE inviato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inviato The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function filterByInviato($inviato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inviato)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inviato)) {
                $inviato = str_replace('*', '%', $inviato);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CronsTableMap::COL_INVIATO, $inviato, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCrons $crons Object to remove from the list of results
     *
     * @return $this|ChildCronsQuery The current query, for fluid interface
     */
    public function prune($crons = null)
    {
        if ($crons) {
            $this->addUsingAlias(CronsTableMap::COL_IDCRON, $crons->getIdcron(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the crons table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CronsTableMap::clearInstancePool();
            CronsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CronsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CronsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CronsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CronsQuery
