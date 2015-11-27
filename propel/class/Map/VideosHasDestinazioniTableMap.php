<?php

namespace Map;

use \VideosHasDestinazioni;
use \VideosHasDestinazioniQuery;
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
 * This class defines the structure of the 'videos_has_destinazioni' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VideosHasDestinazioniTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.VideosHasDestinazioniTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'videos_has_destinazioni';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\VideosHasDestinazioni';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'VideosHasDestinazioni';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 3;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 3;

    /**
     * the column name for the idvideos_has_destinazioni field
     */
    const COL_IDVIDEOS_HAS_DESTINAZIONI = 'videos_has_destinazioni.idvideos_has_destinazioni';

    /**
     * the column name for the videos_idvideo field
     */
    const COL_VIDEOS_IDVIDEO = 'videos_has_destinazioni.videos_idvideo';

    /**
     * the column name for the destinazioni_iddestinazione field
     */
    const COL_DESTINAZIONI_IDDESTINAZIONE = 'videos_has_destinazioni.destinazioni_iddestinazione';

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
        self::TYPE_PHPNAME       => array('IdvideosHasDestinazioni', 'VideosIdvideo', 'DestinazioniIddestinazione', ),
        self::TYPE_CAMELNAME     => array('idvideosHasDestinazioni', 'videosIdvideo', 'destinazioniIddestinazione', ),
        self::TYPE_COLNAME       => array(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI, VideosHasDestinazioniTableMap::COL_VIDEOS_IDVIDEO, VideosHasDestinazioniTableMap::COL_DESTINAZIONI_IDDESTINAZIONE, ),
        self::TYPE_FIELDNAME     => array('idvideos_has_destinazioni', 'videos_idvideo', 'destinazioni_iddestinazione', ),
        self::TYPE_NUM           => array(0, 1, 2, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('IdvideosHasDestinazioni' => 0, 'VideosIdvideo' => 1, 'DestinazioniIddestinazione' => 2, ),
        self::TYPE_CAMELNAME     => array('idvideosHasDestinazioni' => 0, 'videosIdvideo' => 1, 'destinazioniIddestinazione' => 2, ),
        self::TYPE_COLNAME       => array(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI => 0, VideosHasDestinazioniTableMap::COL_VIDEOS_IDVIDEO => 1, VideosHasDestinazioniTableMap::COL_DESTINAZIONI_IDDESTINAZIONE => 2, ),
        self::TYPE_FIELDNAME     => array('idvideos_has_destinazioni' => 0, 'videos_idvideo' => 1, 'destinazioni_iddestinazione' => 2, ),
        self::TYPE_NUM           => array(0, 1, 2, )
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
        $this->setName('videos_has_destinazioni');
        $this->setPhpName('VideosHasDestinazioni');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\VideosHasDestinazioni');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idvideos_has_destinazioni', 'IdvideosHasDestinazioni', 'INTEGER', true, null, null);
        $this->addColumn('videos_idvideo', 'VideosIdvideo', 'INTEGER', true, null, null);
        $this->addColumn('destinazioni_iddestinazione', 'DestinazioniIddestinazione', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdvideosHasDestinazioni', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('IdvideosHasDestinazioni', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('IdvideosHasDestinazioni', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? VideosHasDestinazioniTableMap::CLASS_DEFAULT : VideosHasDestinazioniTableMap::OM_CLASS;
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
     * @return array           (VideosHasDestinazioni object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VideosHasDestinazioniTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VideosHasDestinazioniTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VideosHasDestinazioniTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VideosHasDestinazioniTableMap::OM_CLASS;
            /** @var VideosHasDestinazioni $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VideosHasDestinazioniTableMap::addInstanceToPool($obj, $key);
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
            $key = VideosHasDestinazioniTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VideosHasDestinazioniTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var VideosHasDestinazioni $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VideosHasDestinazioniTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI);
            $criteria->addSelectColumn(VideosHasDestinazioniTableMap::COL_VIDEOS_IDVIDEO);
            $criteria->addSelectColumn(VideosHasDestinazioniTableMap::COL_DESTINAZIONI_IDDESTINAZIONE);
        } else {
            $criteria->addSelectColumn($alias . '.idvideos_has_destinazioni');
            $criteria->addSelectColumn($alias . '.videos_idvideo');
            $criteria->addSelectColumn($alias . '.destinazioni_iddestinazione');
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
        return Propel::getServiceContainer()->getDatabaseMap(VideosHasDestinazioniTableMap::DATABASE_NAME)->getTable(VideosHasDestinazioniTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VideosHasDestinazioniTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VideosHasDestinazioniTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VideosHasDestinazioniTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a VideosHasDestinazioni or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or VideosHasDestinazioni object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(VideosHasDestinazioniTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \VideosHasDestinazioni) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VideosHasDestinazioniTableMap::DATABASE_NAME);
            $criteria->add(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI, (array) $values, Criteria::IN);
        }

        $query = VideosHasDestinazioniQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VideosHasDestinazioniTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VideosHasDestinazioniTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the videos_has_destinazioni table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VideosHasDestinazioniQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a VideosHasDestinazioni or Criteria object.
     *
     * @param mixed               $criteria Criteria or VideosHasDestinazioni object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VideosHasDestinazioniTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from VideosHasDestinazioni object
        }

        if ($criteria->containsKey(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI) && $criteria->keyContainsValue(VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VideosHasDestinazioniTableMap::COL_IDVIDEOS_HAS_DESTINAZIONI.')');
        }


        // Set the correct dbName
        $query = VideosHasDestinazioniQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VideosHasDestinazioniTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VideosHasDestinazioniTableMap::buildTableMap();
