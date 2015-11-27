<?php

namespace Map;

use \Videos;
use \VideosQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'videos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VideosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.VideosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'videos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Videos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Videos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the idvideo field
     */
    const COL_IDVIDEO = 'videos.idvideo';

    /**
     * the column name for the link_video field
     */
    const COL_LINK_VIDEO = 'videos.link_video';

    /**
     * the column name for the size_video field
     */
    const COL_SIZE_VIDEO = 'videos.size_video';

    /**
     * the column name for the uploaded_video field
     */
    const COL_UPLOADED_VIDEO = 'videos.uploaded_video';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'videos.nome';

    /**
     * the column name for the idyoutube field
     */
    const COL_IDYOUTUBE = 'videos.idyoutube';

    /**
     * the column name for the video_md5 field
     */
    const COL_VIDEO_MD5 = 'videos.video_md5';

    /**
     * the column name for the convertito field
     */
    const COL_CONVERTITO = 'videos.convertito';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Idvideo', 'LinkVideo', 'SizeVideo', 'UploadedVideo', 'Nome', 'Idyoutube', 'VideoMd5', 'Convertito', ),
        self::TYPE_CAMELNAME     => array('idvideo', 'linkVideo', 'sizeVideo', 'uploadedVideo', 'nome', 'idyoutube', 'videoMd5', 'convertito', ),
        self::TYPE_COLNAME       => array(VideosTableMap::COL_IDVIDEO, VideosTableMap::COL_LINK_VIDEO, VideosTableMap::COL_SIZE_VIDEO, VideosTableMap::COL_UPLOADED_VIDEO, VideosTableMap::COL_NOME, VideosTableMap::COL_IDYOUTUBE, VideosTableMap::COL_VIDEO_MD5, VideosTableMap::COL_CONVERTITO, ),
        self::TYPE_FIELDNAME     => array('idvideo', 'link_video', 'size_video', 'uploaded_video', 'nome', 'idyoutube', 'video_md5', 'convertito', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idvideo' => 0, 'LinkVideo' => 1, 'SizeVideo' => 2, 'UploadedVideo' => 3, 'Nome' => 4, 'Idyoutube' => 5, 'VideoMd5' => 6, 'Convertito' => 7, ),
        self::TYPE_CAMELNAME     => array('idvideo' => 0, 'linkVideo' => 1, 'sizeVideo' => 2, 'uploadedVideo' => 3, 'nome' => 4, 'idyoutube' => 5, 'videoMd5' => 6, 'convertito' => 7, ),
        self::TYPE_COLNAME       => array(VideosTableMap::COL_IDVIDEO => 0, VideosTableMap::COL_LINK_VIDEO => 1, VideosTableMap::COL_SIZE_VIDEO => 2, VideosTableMap::COL_UPLOADED_VIDEO => 3, VideosTableMap::COL_NOME => 4, VideosTableMap::COL_IDYOUTUBE => 5, VideosTableMap::COL_VIDEO_MD5 => 6, VideosTableMap::COL_CONVERTITO => 7, ),
        self::TYPE_FIELDNAME     => array('idvideo' => 0, 'link_video' => 1, 'size_video' => 2, 'uploaded_video' => 3, 'nome' => 4, 'idyoutube' => 5, 'video_md5' => 6, 'convertito' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('videos');
        $this->setPhpName('Videos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Videos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idvideo', 'Idvideo', 'INTEGER', true, null, null);
        $this->addColumn('link_video', 'LinkVideo', 'VARCHAR', false, 255, null);
        $this->addColumn('size_video', 'SizeVideo', 'INTEGER', false, null, null);
        $this->addColumn('uploaded_video', 'UploadedVideo', 'BOOLEAN', false, 1, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', false, 255, null);
        $this->addColumn('idyoutube', 'Idyoutube', 'VARCHAR', false, 255, null);
        $this->addColumn('video_md5', 'VideoMd5', 'VARCHAR', false, 255, null);
        $this->addColumn('convertito', 'Convertito', 'VARCHAR', false, 2, 'n');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idvideo', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idvideo', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Idvideo', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? VideosTableMap::CLASS_DEFAULT : VideosTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Videos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VideosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VideosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VideosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VideosTableMap::OM_CLASS;
            /** @var Videos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VideosTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = VideosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VideosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Videos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VideosTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(VideosTableMap::COL_IDVIDEO);
            $criteria->addSelectColumn(VideosTableMap::COL_LINK_VIDEO);
            $criteria->addSelectColumn(VideosTableMap::COL_SIZE_VIDEO);
            $criteria->addSelectColumn(VideosTableMap::COL_UPLOADED_VIDEO);
            $criteria->addSelectColumn(VideosTableMap::COL_NOME);
            $criteria->addSelectColumn(VideosTableMap::COL_IDYOUTUBE);
            $criteria->addSelectColumn(VideosTableMap::COL_VIDEO_MD5);
            $criteria->addSelectColumn(VideosTableMap::COL_CONVERTITO);
        } else {
            $criteria->addSelectColumn($alias . '.idvideo');
            $criteria->addSelectColumn($alias . '.link_video');
            $criteria->addSelectColumn($alias . '.size_video');
            $criteria->addSelectColumn($alias . '.uploaded_video');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.idyoutube');
            $criteria->addSelectColumn($alias . '.video_md5');
            $criteria->addSelectColumn($alias . '.convertito');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(VideosTableMap::DATABASE_NAME)->getTable(VideosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VideosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VideosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VideosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Videos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Videos object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VideosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Videos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VideosTableMap::DATABASE_NAME);
            $criteria->add(VideosTableMap::COL_IDVIDEO, (array) $values, Criteria::IN);
        }

        $query = VideosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VideosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VideosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the videos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VideosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Videos or Criteria object.
     *
     * @param mixed               $criteria Criteria or Videos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VideosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Videos object
        }

        if ($criteria->containsKey(VideosTableMap::COL_IDVIDEO) && $criteria->keyContainsValue(VideosTableMap::COL_IDVIDEO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VideosTableMap::COL_IDVIDEO.')');
        }


        // Set the correct dbName
        $query = VideosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VideosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VideosTableMap::buildTableMap();
