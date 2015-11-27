<?php

namespace Base;

use \Videos as ChildVideos;
use \VideosQuery as ChildVideosQuery;
use \Exception;
use \PDO;
use Map\VideosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'videos' table.
 *
 *
 *
 * @method     ChildVideosQuery orderByIdvideo($order = Criteria::ASC) Order by the idvideo column
 * @method     ChildVideosQuery orderByLinkVideo($order = Criteria::ASC) Order by the link_video column
 * @method     ChildVideosQuery orderBySizeVideo($order = Criteria::ASC) Order by the size_video column
 * @method     ChildVideosQuery orderByUploadedVideo($order = Criteria::ASC) Order by the uploaded_video column
 * @method     ChildVideosQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildVideosQuery orderByIdyoutube($order = Criteria::ASC) Order by the idyoutube column
 * @method     ChildVideosQuery orderByVideoMd5($order = Criteria::ASC) Order by the video_md5 column
 * @method     ChildVideosQuery orderByConvertito($order = Criteria::ASC) Order by the convertito column
 *
 * @method     ChildVideosQuery groupByIdvideo() Group by the idvideo column
 * @method     ChildVideosQuery groupByLinkVideo() Group by the link_video column
 * @method     ChildVideosQuery groupBySizeVideo() Group by the size_video column
 * @method     ChildVideosQuery groupByUploadedVideo() Group by the uploaded_video column
 * @method     ChildVideosQuery groupByNome() Group by the nome column
 * @method     ChildVideosQuery groupByIdyoutube() Group by the idyoutube column
 * @method     ChildVideosQuery groupByVideoMd5() Group by the video_md5 column
 * @method     ChildVideosQuery groupByConvertito() Group by the convertito column
 *
 * @method     ChildVideosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVideosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVideosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVideosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVideosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVideosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVideos findOne(ConnectionInterface $con = null) Return the first ChildVideos matching the query
 * @method     ChildVideos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVideos matching the query, or a new ChildVideos object populated from the query conditions when no match is found
 *
 * @method     ChildVideos findOneByIdvideo(int $idvideo) Return the first ChildVideos filtered by the idvideo column
 * @method     ChildVideos findOneByLinkVideo(string $link_video) Return the first ChildVideos filtered by the link_video column
 * @method     ChildVideos findOneBySizeVideo(int $size_video) Return the first ChildVideos filtered by the size_video column
 * @method     ChildVideos findOneByUploadedVideo(boolean $uploaded_video) Return the first ChildVideos filtered by the uploaded_video column
 * @method     ChildVideos findOneByNome(string $nome) Return the first ChildVideos filtered by the nome column
 * @method     ChildVideos findOneByIdyoutube(string $idyoutube) Return the first ChildVideos filtered by the idyoutube column
 * @method     ChildVideos findOneByVideoMd5(string $video_md5) Return the first ChildVideos filtered by the video_md5 column
 * @method     ChildVideos findOneByConvertito(string $convertito) Return the first ChildVideos filtered by the convertito column *

 * @method     ChildVideos requirePk($key, ConnectionInterface $con = null) Return the ChildVideos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOne(ConnectionInterface $con = null) Return the first ChildVideos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVideos requireOneByIdvideo(int $idvideo) Return the first ChildVideos filtered by the idvideo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByLinkVideo(string $link_video) Return the first ChildVideos filtered by the link_video column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneBySizeVideo(int $size_video) Return the first ChildVideos filtered by the size_video column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByUploadedVideo(boolean $uploaded_video) Return the first ChildVideos filtered by the uploaded_video column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByNome(string $nome) Return the first ChildVideos filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByIdyoutube(string $idyoutube) Return the first ChildVideos filtered by the idyoutube column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByVideoMd5(string $video_md5) Return the first ChildVideos filtered by the video_md5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVideos requireOneByConvertito(string $convertito) Return the first ChildVideos filtered by the convertito column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVideos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVideos objects based on current ModelCriteria
 * @method     ChildVideos[]|ObjectCollection findByIdvideo(int $idvideo) Return ChildVideos objects filtered by the idvideo column
 * @method     ChildVideos[]|ObjectCollection findByLinkVideo(string $link_video) Return ChildVideos objects filtered by the link_video column
 * @method     ChildVideos[]|ObjectCollection findBySizeVideo(int $size_video) Return ChildVideos objects filtered by the size_video column
 * @method     ChildVideos[]|ObjectCollection findByUploadedVideo(boolean $uploaded_video) Return ChildVideos objects filtered by the uploaded_video column
 * @method     ChildVideos[]|ObjectCollection findByNome(string $nome) Return ChildVideos objects filtered by the nome column
 * @method     ChildVideos[]|ObjectCollection findByIdyoutube(string $idyoutube) Return ChildVideos objects filtered by the idyoutube column
 * @method     ChildVideos[]|ObjectCollection findByVideoMd5(string $video_md5) Return ChildVideos objects filtered by the video_md5 column
 * @method     ChildVideos[]|ObjectCollection findByConvertito(string $convertito) Return ChildVideos objects filtered by the convertito column
 * @method     ChildVideos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VideosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\VideosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Videos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVideosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVideosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVideosQuery) {
            return $criteria;
        }
        $query = new ChildVideosQuery();
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
     * @return ChildVideos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VideosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VideosTableMap::DATABASE_NAME);
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
     * @return ChildVideos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idvideo, link_video, size_video, uploaded_video, nome, idyoutube, video_md5, convertito FROM videos WHERE idvideo = :p0';
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
            /** @var ChildVideos $obj */
            $obj = new ChildVideos();
            $obj->hydrate($row);
            VideosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildVideos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idvideo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdvideo(1234); // WHERE idvideo = 1234
     * $query->filterByIdvideo(array(12, 34)); // WHERE idvideo IN (12, 34)
     * $query->filterByIdvideo(array('min' => 12)); // WHERE idvideo > 12
     * </code>
     *
     * @param     mixed $idvideo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByIdvideo($idvideo = null, $comparison = null)
    {
        if (is_array($idvideo)) {
            $useMinMax = false;
            if (isset($idvideo['min'])) {
                $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $idvideo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idvideo['max'])) {
                $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $idvideo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $idvideo, $comparison);
    }

    /**
     * Filter the query on the link_video column
     *
     * Example usage:
     * <code>
     * $query->filterByLinkVideo('fooValue');   // WHERE link_video = 'fooValue'
     * $query->filterByLinkVideo('%fooValue%'); // WHERE link_video LIKE '%fooValue%'
     * </code>
     *
     * @param     string $linkVideo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByLinkVideo($linkVideo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linkVideo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $linkVideo)) {
                $linkVideo = str_replace('*', '%', $linkVideo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_LINK_VIDEO, $linkVideo, $comparison);
    }

    /**
     * Filter the query on the size_video column
     *
     * Example usage:
     * <code>
     * $query->filterBySizeVideo(1234); // WHERE size_video = 1234
     * $query->filterBySizeVideo(array(12, 34)); // WHERE size_video IN (12, 34)
     * $query->filterBySizeVideo(array('min' => 12)); // WHERE size_video > 12
     * </code>
     *
     * @param     mixed $sizeVideo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterBySizeVideo($sizeVideo = null, $comparison = null)
    {
        if (is_array($sizeVideo)) {
            $useMinMax = false;
            if (isset($sizeVideo['min'])) {
                $this->addUsingAlias(VideosTableMap::COL_SIZE_VIDEO, $sizeVideo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sizeVideo['max'])) {
                $this->addUsingAlias(VideosTableMap::COL_SIZE_VIDEO, $sizeVideo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_SIZE_VIDEO, $sizeVideo, $comparison);
    }

    /**
     * Filter the query on the uploaded_video column
     *
     * Example usage:
     * <code>
     * $query->filterByUploadedVideo(true); // WHERE uploaded_video = true
     * $query->filterByUploadedVideo('yes'); // WHERE uploaded_video = true
     * </code>
     *
     * @param     boolean|string $uploadedVideo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByUploadedVideo($uploadedVideo = null, $comparison = null)
    {
        if (is_string($uploadedVideo)) {
            $uploadedVideo = in_array(strtolower($uploadedVideo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VideosTableMap::COL_UPLOADED_VIDEO, $uploadedVideo, $comparison);
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
     * @return $this|ChildVideosQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VideosTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the idyoutube column
     *
     * Example usage:
     * <code>
     * $query->filterByIdyoutube('fooValue');   // WHERE idyoutube = 'fooValue'
     * $query->filterByIdyoutube('%fooValue%'); // WHERE idyoutube LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idyoutube The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByIdyoutube($idyoutube = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idyoutube)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idyoutube)) {
                $idyoutube = str_replace('*', '%', $idyoutube);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_IDYOUTUBE, $idyoutube, $comparison);
    }

    /**
     * Filter the query on the video_md5 column
     *
     * Example usage:
     * <code>
     * $query->filterByVideoMd5('fooValue');   // WHERE video_md5 = 'fooValue'
     * $query->filterByVideoMd5('%fooValue%'); // WHERE video_md5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $videoMd5 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByVideoMd5($videoMd5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($videoMd5)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $videoMd5)) {
                $videoMd5 = str_replace('*', '%', $videoMd5);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_VIDEO_MD5, $videoMd5, $comparison);
    }

    /**
     * Filter the query on the convertito column
     *
     * Example usage:
     * <code>
     * $query->filterByConvertito('fooValue');   // WHERE convertito = 'fooValue'
     * $query->filterByConvertito('%fooValue%'); // WHERE convertito LIKE '%fooValue%'
     * </code>
     *
     * @param     string $convertito The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function filterByConvertito($convertito = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($convertito)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $convertito)) {
                $convertito = str_replace('*', '%', $convertito);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VideosTableMap::COL_CONVERTITO, $convertito, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVideos $videos Object to remove from the list of results
     *
     * @return $this|ChildVideosQuery The current query, for fluid interface
     */
    public function prune($videos = null)
    {
        if ($videos) {
            $this->addUsingAlias(VideosTableMap::COL_IDVIDEO, $videos->getIdvideo(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the videos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VideosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VideosTableMap::clearInstancePool();
            VideosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(VideosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VideosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VideosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VideosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VideosQuery
