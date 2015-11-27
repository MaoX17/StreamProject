<?php

namespace Map;

use \Destinazioni;
use \DestinazioniQuery;
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
 * This class defines the structure of the 'destinazioni' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DestinazioniTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DestinazioniTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'destinazioni';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Destinazioni';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Destinazioni';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the iddestinazione field
     */
    const COL_IDDESTINAZIONE = 'destinazioni.iddestinazione';

    /**
     * the column name for the stream_server field
     */
    const COL_STREAM_SERVER = 'destinazioni.stream_server';

    /**
     * the column name for the key_server field
     */
    const COL_KEY_SERVER = 'destinazioni.key_server';

    /**
     * the column name for the parametri field
     */
    const COL_PARAMETRI = 'destinazioni.parametri';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'destinazioni.nome';

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
        self::TYPE_PHPNAME       => array('Iddestinazione', 'StreamServer', 'KeyServer', 'Parametri', 'Nome', ),
        self::TYPE_CAMELNAME     => array('iddestinazione', 'streamServer', 'keyServer', 'parametri', 'nome', ),
        self::TYPE_COLNAME       => array(DestinazioniTableMap::COL_IDDESTINAZIONE, DestinazioniTableMap::COL_STREAM_SERVER, DestinazioniTableMap::COL_KEY_SERVER, DestinazioniTableMap::COL_PARAMETRI, DestinazioniTableMap::COL_NOME, ),
        self::TYPE_FIELDNAME     => array('iddestinazione', 'stream_server', 'key_server', 'parametri', 'nome', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Iddestinazione' => 0, 'StreamServer' => 1, 'KeyServer' => 2, 'Parametri' => 3, 'Nome' => 4, ),
        self::TYPE_CAMELNAME     => array('iddestinazione' => 0, 'streamServer' => 1, 'keyServer' => 2, 'parametri' => 3, 'nome' => 4, ),
        self::TYPE_COLNAME       => array(DestinazioniTableMap::COL_IDDESTINAZIONE => 0, DestinazioniTableMap::COL_STREAM_SERVER => 1, DestinazioniTableMap::COL_KEY_SERVER => 2, DestinazioniTableMap::COL_PARAMETRI => 3, DestinazioniTableMap::COL_NOME => 4, ),
        self::TYPE_FIELDNAME     => array('iddestinazione' => 0, 'stream_server' => 1, 'key_server' => 2, 'parametri' => 3, 'nome' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('destinazioni');
        $this->setPhpName('Destinazioni');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Destinazioni');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('iddestinazione', 'Iddestinazione', 'INTEGER', true, null, null);
        $this->addColumn('stream_server', 'StreamServer', 'VARCHAR', false, 255, null);
        $this->addColumn('key_server', 'KeyServer', 'VARCHAR', false, 255, null);
        $this->addColumn('parametri', 'Parametri', 'VARCHAR', false, 255, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', false, 255, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iddestinazione', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iddestinazione', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Iddestinazione', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? DestinazioniTableMap::CLASS_DEFAULT : DestinazioniTableMap::OM_CLASS;
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
     * @return array           (Destinazioni object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DestinazioniTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DestinazioniTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DestinazioniTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DestinazioniTableMap::OM_CLASS;
            /** @var Destinazioni $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DestinazioniTableMap::addInstanceToPool($obj, $key);
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
            $key = DestinazioniTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DestinazioniTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Destinazioni $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DestinazioniTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DestinazioniTableMap::COL_IDDESTINAZIONE);
            $criteria->addSelectColumn(DestinazioniTableMap::COL_STREAM_SERVER);
            $criteria->addSelectColumn(DestinazioniTableMap::COL_KEY_SERVER);
            $criteria->addSelectColumn(DestinazioniTableMap::COL_PARAMETRI);
            $criteria->addSelectColumn(DestinazioniTableMap::COL_NOME);
        } else {
            $criteria->addSelectColumn($alias . '.iddestinazione');
            $criteria->addSelectColumn($alias . '.stream_server');
            $criteria->addSelectColumn($alias . '.key_server');
            $criteria->addSelectColumn($alias . '.parametri');
            $criteria->addSelectColumn($alias . '.nome');
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
        return Propel::getServiceContainer()->getDatabaseMap(DestinazioniTableMap::DATABASE_NAME)->getTable(DestinazioniTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DestinazioniTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DestinazioniTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DestinazioniTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Destinazioni or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Destinazioni object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DestinazioniTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Destinazioni) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DestinazioniTableMap::DATABASE_NAME);
            $criteria->add(DestinazioniTableMap::COL_IDDESTINAZIONE, (array) $values, Criteria::IN);
        }

        $query = DestinazioniQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DestinazioniTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DestinazioniTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the destinazioni table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DestinazioniQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Destinazioni or Criteria object.
     *
     * @param mixed               $criteria Criteria or Destinazioni object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DestinazioniTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Destinazioni object
        }

        if ($criteria->containsKey(DestinazioniTableMap::COL_IDDESTINAZIONE) && $criteria->keyContainsValue(DestinazioniTableMap::COL_IDDESTINAZIONE) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DestinazioniTableMap::COL_IDDESTINAZIONE.')');
        }


        // Set the correct dbName
        $query = DestinazioniQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DestinazioniTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DestinazioniTableMap::buildTableMap();
