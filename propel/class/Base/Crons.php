<?php

namespace Base;

use \CronsQuery as ChildCronsQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\CronsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'crons' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Crons implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CronsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the idcron field.
     *
     * @var        int
     */
    protected $idcron;

    /**
     * The value for the minuto field.
     *
     * @var        string
     */
    protected $minuto;

    /**
     * The value for the ora field.
     *
     * @var        string
     */
    protected $ora;

    /**
     * The value for the giorno_del_mese field.
     *
     * @var        string
     */
    protected $giorno_del_mese;

    /**
     * The value for the mese field.
     *
     * @var        string
     */
    protected $mese;

    /**
     * The value for the giorno_della_settimana field.
     *
     * @var        string
     */
    protected $giorno_della_settimana;

    /**
     * The value for the comando field.
     *
     * @var        string
     */
    protected $comando;

    /**
     * The value for the videos_has_destinazioni_idvideos_has_destinazioni field.
     *
     * @var        int
     */
    protected $videos_has_destinazioni_idvideos_has_destinazioni;

    /**
     * The value for the next_date field.
     *
     * @var        \DateTime
     */
    protected $next_date;

    /**
     * The value for the next_time field.
     *
     * @var        \DateTime
     */
    protected $next_time;

    /**
     * The value for the inviato field.
     *
     * Note: this column has a database default value of: 'n'
     * @var        string
     */
    protected $inviato;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->inviato = 'n';
    }

    /**
     * Initializes internal state of Base\Crons object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Crons</code> instance.  If
     * <code>obj</code> is an instance of <code>Crons</code>, delegates to
     * <code>equals(Crons)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Crons The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [idcron] column value.
     *
     * @return int
     */
    public function getIdcron()
    {
        return $this->idcron;
    }

    /**
     * Get the [minuto] column value.
     *
     * @return string
     */
    public function getMinuto()
    {
        return $this->minuto;
    }

    /**
     * Get the [ora] column value.
     *
     * @return string
     */
    public function getOra()
    {
        return $this->ora;
    }

    /**
     * Get the [giorno_del_mese] column value.
     *
     * @return string
     */
    public function getGiornoDelMese()
    {
        return $this->giorno_del_mese;
    }

    /**
     * Get the [mese] column value.
     *
     * @return string
     */
    public function getMese()
    {
        return $this->mese;
    }

    /**
     * Get the [giorno_della_settimana] column value.
     *
     * @return string
     */
    public function getGiornoDellaSettimana()
    {
        return $this->giorno_della_settimana;
    }

    /**
     * Get the [comando] column value.
     *
     * @return string
     */
    public function getComando()
    {
        return $this->comando;
    }

    /**
     * Get the [videos_has_destinazioni_idvideos_has_destinazioni] column value.
     *
     * @return int
     */
    public function getVideosHasDestinazioniIdvideosHasDestinazioni()
    {
        return $this->videos_has_destinazioni_idvideos_has_destinazioni;
    }

    /**
     * Get the [optionally formatted] temporal [next_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getNextDate($format = NULL)
    {
        if ($format === null) {
            return $this->next_date;
        } else {
            return $this->next_date instanceof \DateTime ? $this->next_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [next_time] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getNextTime($format = NULL)
    {
        if ($format === null) {
            return $this->next_time;
        } else {
            return $this->next_time instanceof \DateTime ? $this->next_time->format($format) : null;
        }
    }

    /**
     * Get the [inviato] column value.
     *
     * @return string
     */
    public function getInviato()
    {
        return $this->inviato;
    }

    /**
     * Set the value of [idcron] column.
     *
     * @param int $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setIdcron($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idcron !== $v) {
            $this->idcron = $v;
            $this->modifiedColumns[CronsTableMap::COL_IDCRON] = true;
        }

        return $this;
    } // setIdcron()

    /**
     * Set the value of [minuto] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setMinuto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minuto !== $v) {
            $this->minuto = $v;
            $this->modifiedColumns[CronsTableMap::COL_MINUTO] = true;
        }

        return $this;
    } // setMinuto()

    /**
     * Set the value of [ora] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setOra($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ora !== $v) {
            $this->ora = $v;
            $this->modifiedColumns[CronsTableMap::COL_ORA] = true;
        }

        return $this;
    } // setOra()

    /**
     * Set the value of [giorno_del_mese] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setGiornoDelMese($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->giorno_del_mese !== $v) {
            $this->giorno_del_mese = $v;
            $this->modifiedColumns[CronsTableMap::COL_GIORNO_DEL_MESE] = true;
        }

        return $this;
    } // setGiornoDelMese()

    /**
     * Set the value of [mese] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setMese($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->mese !== $v) {
            $this->mese = $v;
            $this->modifiedColumns[CronsTableMap::COL_MESE] = true;
        }

        return $this;
    } // setMese()

    /**
     * Set the value of [giorno_della_settimana] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setGiornoDellaSettimana($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->giorno_della_settimana !== $v) {
            $this->giorno_della_settimana = $v;
            $this->modifiedColumns[CronsTableMap::COL_GIORNO_DELLA_SETTIMANA] = true;
        }

        return $this;
    } // setGiornoDellaSettimana()

    /**
     * Set the value of [comando] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setComando($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comando !== $v) {
            $this->comando = $v;
            $this->modifiedColumns[CronsTableMap::COL_COMANDO] = true;
        }

        return $this;
    } // setComando()

    /**
     * Set the value of [videos_has_destinazioni_idvideos_has_destinazioni] column.
     *
     * @param int $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setVideosHasDestinazioniIdvideosHasDestinazioni($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->videos_has_destinazioni_idvideos_has_destinazioni !== $v) {
            $this->videos_has_destinazioni_idvideos_has_destinazioni = $v;
            $this->modifiedColumns[CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI] = true;
        }

        return $this;
    } // setVideosHasDestinazioniIdvideosHasDestinazioni()

    /**
     * Sets the value of [next_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setNextDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->next_date !== null || $dt !== null) {
            if ($this->next_date === null || $dt === null || $dt->format("Y-m-d") !== $this->next_date->format("Y-m-d")) {
                $this->next_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CronsTableMap::COL_NEXT_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setNextDate()

    /**
     * Sets the value of [next_time] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setNextTime($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->next_time !== null || $dt !== null) {
            if ($this->next_time === null || $dt === null || $dt->format("H:i:s") !== $this->next_time->format("H:i:s")) {
                $this->next_time = $dt === null ? null : clone $dt;
                $this->modifiedColumns[CronsTableMap::COL_NEXT_TIME] = true;
            }
        } // if either are not null

        return $this;
    } // setNextTime()

    /**
     * Set the value of [inviato] column.
     *
     * @param string $v new value
     * @return $this|\Crons The current object (for fluent API support)
     */
    public function setInviato($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->inviato !== $v) {
            $this->inviato = $v;
            $this->modifiedColumns[CronsTableMap::COL_INVIATO] = true;
        }

        return $this;
    } // setInviato()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->inviato !== 'n') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CronsTableMap::translateFieldName('Idcron', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idcron = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CronsTableMap::translateFieldName('Minuto', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minuto = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CronsTableMap::translateFieldName('Ora', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ora = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CronsTableMap::translateFieldName('GiornoDelMese', TableMap::TYPE_PHPNAME, $indexType)];
            $this->giorno_del_mese = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CronsTableMap::translateFieldName('Mese', TableMap::TYPE_PHPNAME, $indexType)];
            $this->mese = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CronsTableMap::translateFieldName('GiornoDellaSettimana', TableMap::TYPE_PHPNAME, $indexType)];
            $this->giorno_della_settimana = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CronsTableMap::translateFieldName('Comando', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comando = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CronsTableMap::translateFieldName('VideosHasDestinazioniIdvideosHasDestinazioni', TableMap::TYPE_PHPNAME, $indexType)];
            $this->videos_has_destinazioni_idvideos_has_destinazioni = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CronsTableMap::translateFieldName('NextDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->next_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CronsTableMap::translateFieldName('NextTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->next_time = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CronsTableMap::translateFieldName('Inviato', TableMap::TYPE_PHPNAME, $indexType)];
            $this->inviato = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 11; // 11 = CronsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Crons'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CronsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCronsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Crons::setDeleted()
     * @see Crons::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCronsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CronsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                CronsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[CronsTableMap::COL_IDCRON] = true;
        if (null !== $this->idcron) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CronsTableMap::COL_IDCRON . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CronsTableMap::COL_IDCRON)) {
            $modifiedColumns[':p' . $index++]  = 'idcron';
        }
        if ($this->isColumnModified(CronsTableMap::COL_MINUTO)) {
            $modifiedColumns[':p' . $index++]  = 'minuto';
        }
        if ($this->isColumnModified(CronsTableMap::COL_ORA)) {
            $modifiedColumns[':p' . $index++]  = 'ora';
        }
        if ($this->isColumnModified(CronsTableMap::COL_GIORNO_DEL_MESE)) {
            $modifiedColumns[':p' . $index++]  = 'giorno_del_mese';
        }
        if ($this->isColumnModified(CronsTableMap::COL_MESE)) {
            $modifiedColumns[':p' . $index++]  = 'mese';
        }
        if ($this->isColumnModified(CronsTableMap::COL_GIORNO_DELLA_SETTIMANA)) {
            $modifiedColumns[':p' . $index++]  = 'giorno_della_settimana';
        }
        if ($this->isColumnModified(CronsTableMap::COL_COMANDO)) {
            $modifiedColumns[':p' . $index++]  = 'comando';
        }
        if ($this->isColumnModified(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI)) {
            $modifiedColumns[':p' . $index++]  = 'videos_has_destinazioni_idvideos_has_destinazioni';
        }
        if ($this->isColumnModified(CronsTableMap::COL_NEXT_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'next_date';
        }
        if ($this->isColumnModified(CronsTableMap::COL_NEXT_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'next_time';
        }
        if ($this->isColumnModified(CronsTableMap::COL_INVIATO)) {
            $modifiedColumns[':p' . $index++]  = 'inviato';
        }

        $sql = sprintf(
            'INSERT INTO crons (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'idcron':
                        $stmt->bindValue($identifier, $this->idcron, PDO::PARAM_INT);
                        break;
                    case 'minuto':
                        $stmt->bindValue($identifier, $this->minuto, PDO::PARAM_STR);
                        break;
                    case 'ora':
                        $stmt->bindValue($identifier, $this->ora, PDO::PARAM_STR);
                        break;
                    case 'giorno_del_mese':
                        $stmt->bindValue($identifier, $this->giorno_del_mese, PDO::PARAM_STR);
                        break;
                    case 'mese':
                        $stmt->bindValue($identifier, $this->mese, PDO::PARAM_STR);
                        break;
                    case 'giorno_della_settimana':
                        $stmt->bindValue($identifier, $this->giorno_della_settimana, PDO::PARAM_STR);
                        break;
                    case 'comando':
                        $stmt->bindValue($identifier, $this->comando, PDO::PARAM_STR);
                        break;
                    case 'videos_has_destinazioni_idvideos_has_destinazioni':
                        $stmt->bindValue($identifier, $this->videos_has_destinazioni_idvideos_has_destinazioni, PDO::PARAM_INT);
                        break;
                    case 'next_date':
                        $stmt->bindValue($identifier, $this->next_date ? $this->next_date->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'next_time':
                        $stmt->bindValue($identifier, $this->next_time ? $this->next_time->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'inviato':
                        $stmt->bindValue($identifier, $this->inviato, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdcron($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CronsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdcron();
                break;
            case 1:
                return $this->getMinuto();
                break;
            case 2:
                return $this->getOra();
                break;
            case 3:
                return $this->getGiornoDelMese();
                break;
            case 4:
                return $this->getMese();
                break;
            case 5:
                return $this->getGiornoDellaSettimana();
                break;
            case 6:
                return $this->getComando();
                break;
            case 7:
                return $this->getVideosHasDestinazioniIdvideosHasDestinazioni();
                break;
            case 8:
                return $this->getNextDate();
                break;
            case 9:
                return $this->getNextTime();
                break;
            case 10:
                return $this->getInviato();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Crons'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Crons'][$this->hashCode()] = true;
        $keys = CronsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdcron(),
            $keys[1] => $this->getMinuto(),
            $keys[2] => $this->getOra(),
            $keys[3] => $this->getGiornoDelMese(),
            $keys[4] => $this->getMese(),
            $keys[5] => $this->getGiornoDellaSettimana(),
            $keys[6] => $this->getComando(),
            $keys[7] => $this->getVideosHasDestinazioniIdvideosHasDestinazioni(),
            $keys[8] => $this->getNextDate(),
            $keys[9] => $this->getNextTime(),
            $keys[10] => $this->getInviato(),
        );
        if ($result[$keys[8]] instanceof \DateTime) {
            $result[$keys[8]] = $result[$keys[8]]->format('c');
        }

        if ($result[$keys[9]] instanceof \DateTime) {
            $result[$keys[9]] = $result[$keys[9]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Crons
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CronsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Crons
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdcron($value);
                break;
            case 1:
                $this->setMinuto($value);
                break;
            case 2:
                $this->setOra($value);
                break;
            case 3:
                $this->setGiornoDelMese($value);
                break;
            case 4:
                $this->setMese($value);
                break;
            case 5:
                $this->setGiornoDellaSettimana($value);
                break;
            case 6:
                $this->setComando($value);
                break;
            case 7:
                $this->setVideosHasDestinazioniIdvideosHasDestinazioni($value);
                break;
            case 8:
                $this->setNextDate($value);
                break;
            case 9:
                $this->setNextTime($value);
                break;
            case 10:
                $this->setInviato($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = CronsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdcron($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMinuto($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setOra($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGiornoDelMese($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setMese($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setGiornoDellaSettimana($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setComando($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setVideosHasDestinazioniIdvideosHasDestinazioni($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setNextDate($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNextTime($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setInviato($arr[$keys[10]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Crons The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CronsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CronsTableMap::COL_IDCRON)) {
            $criteria->add(CronsTableMap::COL_IDCRON, $this->idcron);
        }
        if ($this->isColumnModified(CronsTableMap::COL_MINUTO)) {
            $criteria->add(CronsTableMap::COL_MINUTO, $this->minuto);
        }
        if ($this->isColumnModified(CronsTableMap::COL_ORA)) {
            $criteria->add(CronsTableMap::COL_ORA, $this->ora);
        }
        if ($this->isColumnModified(CronsTableMap::COL_GIORNO_DEL_MESE)) {
            $criteria->add(CronsTableMap::COL_GIORNO_DEL_MESE, $this->giorno_del_mese);
        }
        if ($this->isColumnModified(CronsTableMap::COL_MESE)) {
            $criteria->add(CronsTableMap::COL_MESE, $this->mese);
        }
        if ($this->isColumnModified(CronsTableMap::COL_GIORNO_DELLA_SETTIMANA)) {
            $criteria->add(CronsTableMap::COL_GIORNO_DELLA_SETTIMANA, $this->giorno_della_settimana);
        }
        if ($this->isColumnModified(CronsTableMap::COL_COMANDO)) {
            $criteria->add(CronsTableMap::COL_COMANDO, $this->comando);
        }
        if ($this->isColumnModified(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI)) {
            $criteria->add(CronsTableMap::COL_VIDEOS_HAS_DESTINAZIONI_IDVIDEOS_HAS_DESTINAZIONI, $this->videos_has_destinazioni_idvideos_has_destinazioni);
        }
        if ($this->isColumnModified(CronsTableMap::COL_NEXT_DATE)) {
            $criteria->add(CronsTableMap::COL_NEXT_DATE, $this->next_date);
        }
        if ($this->isColumnModified(CronsTableMap::COL_NEXT_TIME)) {
            $criteria->add(CronsTableMap::COL_NEXT_TIME, $this->next_time);
        }
        if ($this->isColumnModified(CronsTableMap::COL_INVIATO)) {
            $criteria->add(CronsTableMap::COL_INVIATO, $this->inviato);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildCronsQuery::create();
        $criteria->add(CronsTableMap::COL_IDCRON, $this->idcron);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdcron();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdcron();
    }

    /**
     * Generic method to set the primary key (idcron column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdcron($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdcron();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Crons (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMinuto($this->getMinuto());
        $copyObj->setOra($this->getOra());
        $copyObj->setGiornoDelMese($this->getGiornoDelMese());
        $copyObj->setMese($this->getMese());
        $copyObj->setGiornoDellaSettimana($this->getGiornoDellaSettimana());
        $copyObj->setComando($this->getComando());
        $copyObj->setVideosHasDestinazioniIdvideosHasDestinazioni($this->getVideosHasDestinazioniIdvideosHasDestinazioni());
        $copyObj->setNextDate($this->getNextDate());
        $copyObj->setNextTime($this->getNextTime());
        $copyObj->setInviato($this->getInviato());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdcron(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Crons Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->idcron = null;
        $this->minuto = null;
        $this->ora = null;
        $this->giorno_del_mese = null;
        $this->mese = null;
        $this->giorno_della_settimana = null;
        $this->comando = null;
        $this->videos_has_destinazioni_idvideos_has_destinazioni = null;
        $this->next_date = null;
        $this->next_time = null;
        $this->inviato = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(CronsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
