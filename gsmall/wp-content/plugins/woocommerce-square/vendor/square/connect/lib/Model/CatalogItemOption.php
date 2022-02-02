<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * CatalogItemOption Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class CatalogItemOption implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'name' => 'string',
        'display_name' => 'string',
        'description' => 'string',
        'show_colors' => 'bool',
        'values' => '\SquareConnect\Model\CatalogObject[]',
        'item_count' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'name' => 'name',
        'display_name' => 'display_name',
        'description' => 'description',
        'show_colors' => 'show_colors',
        'values' => 'values',
        'item_count' => 'item_count'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'name' => 'setName',
        'display_name' => 'setDisplayName',
        'description' => 'setDescription',
        'show_colors' => 'setShowColors',
        'values' => 'setValues',
        'item_count' => 'setItemCount'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'name' => 'getName',
        'display_name' => 'getDisplayName',
        'description' => 'getDescription',
        'show_colors' => 'getShowColors',
        'values' => 'getValues',
        'item_count' => 'getItemCount'
    );
  
    /**
      * $name The item option's display name for the seller. Must be unique across all item options. Searchable.
      * @var string
      */
    protected $name;
    /**
      * $display_name The item option's display name for the customer. Searchable.
      * @var string
      */
    protected $display_name;
    /**
      * $description The item option's human-readable description. Displays for in the Square Point of Sale app for the seller and in the Online Store or on receipts for the buyer.
      * @var string
      */
    protected $description;
    /**
      * $show_colors If true, display colors for entries in `values` when present.
      * @var bool
      */
    protected $show_colors;
    /**
      * $values A list of [CatalogObject](#type-catalogobject)s containing the [CatalogItemOptionValue](#type-catalogitemoptionvalue)s for this item.
      * @var \SquareConnect\Model\CatalogObject[]
      */
    protected $values;
    /**
      * $item_count The number of [CatalogItem](#type-catalogitem)s currently associated with this item option. Present only if the `include_counts` was specified in the request. Any count over 100 will be returned as `100`.
      * @var int
      */
    protected $item_count;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["name"])) {
              $this->name = $data["name"];
            } else {
              $this->name = null;
            }
            if (isset($data["display_name"])) {
              $this->display_name = $data["display_name"];
            } else {
              $this->display_name = null;
            }
            if (isset($data["description"])) {
              $this->description = $data["description"];
            } else {
              $this->description = null;
            }
            if (isset($data["show_colors"])) {
              $this->show_colors = $data["show_colors"];
            } else {
              $this->show_colors = null;
            }
            if (isset($data["values"])) {
              $this->values = $data["values"];
            } else {
              $this->values = null;
            }
            if (isset($data["item_count"])) {
              $this->item_count = $data["item_count"];
            } else {
              $this->item_count = null;
            }
        }
    }
    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
  
    /**
     * Sets name
     * @param string $name The item option's display name for the seller. Must be unique across all item options. Searchable.
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Gets display_name
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }
  
    /**
     * Sets display_name
     * @param string $display_name The item option's display name for the customer. Searchable.
     * @return $this
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;
        return $this;
    }
    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
  
    /**
     * Sets description
     * @param string $description The item option's human-readable description. Displays for in the Square Point of Sale app for the seller and in the Online Store or on receipts for the buyer.
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Gets show_colors
     * @return bool
     */
    public function getShowColors()
    {
        return $this->show_colors;
    }
  
    /**
     * Sets show_colors
     * @param bool $show_colors If true, display colors for entries in `values` when present.
     * @return $this
     */
    public function setShowColors($show_colors)
    {
        $this->show_colors = $show_colors;
        return $this;
    }
    /**
     * Gets values
     * @return \SquareConnect\Model\CatalogObject[]
     */
    public function getValues()
    {
        return $this->values;
    }
  
    /**
     * Sets values
     * @param \SquareConnect\Model\CatalogObject[] $values A list of [CatalogObject](#type-catalogobject)s containing the [CatalogItemOptionValue](#type-catalogitemoptionvalue)s for this item.
     * @return $this
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }
    /**
     * Gets item_count
     * @return int
     */
    public function getItemCount()
    {
        return $this->item_count;
    }
  
    /**
     * Sets item_count
     * @param int $item_count The number of [CatalogItem](#type-catalogitem)s currently associated with this item option. Present only if the `include_counts` was specified in the request. Any count over 100 will be returned as `100`.
     * @return $this
     */
    public function setItemCount($item_count)
    {
        $this->item_count = $item_count;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
