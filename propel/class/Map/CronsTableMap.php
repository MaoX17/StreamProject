<?php

namespace Map;

use \Crons;
use \CronsQuery;
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
 * This class defines the structure of the 'crons' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CronsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CronsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'crons';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Crons';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Crons';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the idcron field
     */
    const COL_IDCRON = 'crons.idcron';

    /**
     * the column name for the minuto field
     */
    const COL_MINUTO = 'crons.minuto';

    /**
     * the column name for the ora field
     */
    const COL_ORA = 'crons.ora';

    /**
     * the column name for the giorno_del_mese field
     */
    const COL_GIORNO_DEL_MESE = 'crons.giorno_del_mese';

    /**
     * the column name for the mese field
     */
    const COL_MESE = 'crons.mese';

    /**
     * the column name for the giorno_della_settimana field
     */
    const COL_GIORNO_DELLA_SETTIMANA = 'crons.giorno_della_settimana';

    /**
     * the column name for the comando field
     */
    const COL_COMANDO = 'crons.comando';

    /**
     * the column name for the videos_has_destinazioni_idvideos_has_destinazioni field
     */
    const COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI = 'crons.videos_has_destinazioni_idvideos_has_destinazioni';

    /**
     * the column name for the next_date field
     */
    const COL_NEXT_DATE = 'crons.next_date';

    /**
     * the column name for the next_time field
     */
    const COL_NEXT_TIME = 'crons.next_time';

    /**
     * the column name for the inviato field
     */
    const COL_INVIATO = 'crons.inviato';

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
        self::TYPE_PHPNAME       => array('Idcron', 'Minuto', 'Ora', 'GiornoDelMese', 'Mese', 'GiornoDellaSettimana', 'Comando', 'VideosHasDestinazioniIdvideosHasDestinazioni', 'NextDate', 'NextTime', 'Inviato', ),
        self::TYPE_CAMELNAME     => array('idcron', 'minuto', 'ora', 'giornoDelMese', 'mese', 'giornoDellaSettimana', 'comando', 'videosHasDestinazioniIdvideosHasDestinazioni', 'nextDate', 'nextTime', 'inviato', ),
        self::TYPE_COLNAME       => array(CronsTableMap::COL_IDCRON, CronsTableMap::COL_MINUTO, CronsTableMap::COL_ORA, CronsTableMap::COL_GIORNO_DEL_MESE, CronsTableMap::COL_MESE, CronsTableMap::COL_GIORNO_DELLA_SETTIMANA, CronsTableMap::COL_COMANDO, CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI, CronsTableMap::COL_NEXT_DATE, CronsTableMap::COL_NEXT_TIME, CronsTableMap::COL_INVIATO, ),
        self::TYPE_FIELDNAME     => array('idcron', 'minuto', 'ora', 'giorno_del_mese', 'mese', 'giorno_della_settimana', 'comando', 'videos_has_destinazioni_idvideos_has_destinazioni', 'next_date', 'next_time', 'inviato', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idcron' => 0, 'Minuto' => 1, 'Ora' => 2, 'GiornoDelMese' => 3, 'Mese' => 4, 'GiornoDellaSettimana' => 5, 'Comando' => 6, 'VideosHasDestinazioniIdvideosHasDestinazioni' => 7, 'NextDate' => 8, 'NextTime' => 9, 'Inviato' => 10, ),
        self::TYPE_CAMELNAME     => array('idcron' => 0, 'minuto' => 1, 'ora' => 2, 'giornoDelMese' => 3, 'mese' => 4, 'giornoDellaSettimana' => 5, 'comando' => 6, 'videosHasDestinazioniIdvideosHasDestinazioni' => 7, 'nextDate' => 8, 'nextTime' => 9, 'inviato' => 10, ),
        self::TYPE_COLNAME       => array(CronsTableMap::COL_IDCRON => 0, CronsTableMap::COL_MINUTO => 1, CronsTableMap::COL_ORA => 2, CronsTableMap::COL_GIORNO_DEL_MESE => 3, CronsTableMap::COL_MESE => 4, CronsTableMap::COL_GIORNO_DELLA_SETTIMANA => 5, CronsTableMap::COL_COMANDO => 6, CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI => 7, CronsTableMap::COL_NEXT_DATE => 8, CronsTableMap::COL_NEXT_TIME => 9, CronsTableMap::COL_INVIATO => 10, ),
        self::TYPE_FIELDNAME     => array('idcron' => 0, 'minuto' => 1, 'ora' => 2, 'giorno_del_mese' => 3, 'mese' => 4, 'giorno_della_settimana' => 5, 'comando' => 6, 'videos_has_destinazioni_idvideos_has_destinazioni' => 7, 'next_date' => 8, 'next_time' => 9, 'inviato' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('crons');
        $this->setPhpName('Crons');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Crons');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idcron', 'Idcron', 'INTEGER', true, null, null);
        $this->addColumn('minuto', 'Minuto', 'VARCHAR', false, 4, null);
        $this->addColumn('ora', 'Ora', 'VARCHAR', false, 4, null);
        $this->addColumn('giorno_del_mese', 'GiornoDelMese', 'VARCHAR', false, 4, null);
        $this->addColumn('mese', 'Mese', 'VARCHAR', false, 4, null);
        $this->addColumn('giorno_della_settimana', 'GiornoDellaSettimana', 'VARCHAR', false, 4, null);
        $this->addColumn('comando', 'Comando', 'VARCHAR', false, 500, null);
        $this->addColumn('videos_has_destinazioni_idvideos_has_destinazioni', 'VideosHasDestinazioniIdvideosHasDestinazioni', 'INTEGER', true, null, null);
        $this->addColumn('next_date', 'NextDate', 'DATE', false, null, null);
        $this->addColumn('next_time', 'NextTime', 'TIME', false, null, null);
        $this->addColumn('inviato', 'Inviato', 'VARCHAR', false, 2, 'n');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcron', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idcron', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Idcron', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? CronsTableMap::CLASS_DEFAULT : CronsTableMap::OM_CLASS;
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
     * @return array           (Crons object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CronsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CronsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CronsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CronsTableMap::OM_CLASS;
            /** @var Crons $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CronsTableMap::addInstanceToPool($obj, $key);
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
            $key = CronsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CronsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Crons $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CronsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CronsTableMap::COL_IDCRON);
            $criteria->addSelectColumn(CronsTableMap::COL_MINUTO);
            $criteria->addSelectColumn(CronsTableMap::COL_ORA);
            $criteria->addSelectColumn(CronsTableMap::COL_GIORNO_DEL_MESE);
            $criteria->addSelectColumn(CronsTableMap::COL_MESE);
            $criteria->addSelectColumn(CronsTableMap::COL_GIORNO_DELLA_SETTIMANA);
            $criteria->addSelectColumn(CronsTableMap::COL_COMANDO);
            $criteria->addSelectColumn(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI);
            $criteria->addSelectColumn(CronsTableMap::COL_NEXT_DATE);
            $criteria->addSelectColumn(CronsTableMap::COL_NEXT_TIME);
            $criteria->addSelectColumn(CronsTableMap::COL_INVIATO);
        } else {
            $criteria->addSelectColumn($alias . '.idcron');
            $criteria->addSelectColumn($alias . '.minuto');
            $criteria->addSelectColumn($alias . '.ora');
            $criteria->addSelectColumn($alias . '.giorno_del_mese');
            $criteria->addSelectColumn($alias . '.mese');
            $criteria->addSelectColumn($alias . '.giorno_della_settimana');
            $criteria->addSelectColumn($alias . '.comando');
            $criteria->addSelectColumn($alias . '.videos_has_destinazioni_idvideos_has_destinazioni');
            $criteria->addSelectColumn($alias . '.next_date');
            $criteria->addSelectColumn($alias . '.next_time');
            $criteria->addSelectColumn($alias . '.inviato');
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
        return Propel::getServiceContainer()->getDatabaseMap(CronsTableMap::DATABASE_NAME)->getTable(CronsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CronsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CronsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CronsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Crons or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Crons object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Crons) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CronsTableMap::DATABASE_NAME);
            $criteria->add(CronsTableMap::COL_IDCRON, (array) $values, Criteria::IN);
        }

        $query = CronsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CronsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CronsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the crons table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CronsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Crons or Criteria object.
     *
     * @param mixed               $criteria Criteria or Crons object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Crons object
        }

        if ($criteria->containsKey(CronsTableMap::COL_IDCRON) && $criteria->keyContainsValue(CronsTableMap::COL_IDCRON) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CronsTableMap::COL_IDCRON.')');
        }


        // Set the correct dbName
        $query = CronsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CronsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CronsTableMap::buildTableMap();
