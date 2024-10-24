# Crosslink VuFind
This repository contains a module, theme and configurations for Crosslink VuFind. 

## Module
The module "Crosslink" should be placed at `$VUFIND_HOME/modules/Crosslink` (VUFIND_HOME, is typically /usr/local/vufind). 
To enable the module for a site, make sure the module is loaded in the http configuration using the line:
```
SetEnv VUFIND_LOCAL_MODULES Crosslink
```
The VuFind installer will generate and apache http configuration. Look for the SetEnv VUFIND_LOCAL_MODULES line, and make sure the Crosslink module is loaded there.

Currently, the module is a stub. There is not customization. To get started, the Record Driver has been extended, but none of the base functions of the SolrMarc record driver are currently extended or overriden. See the [VuFind documentation on code generators](https://vufind.org/wiki/development:code_generators) for instructions on how to extend other classes from the base VuFind module.

## Theme
The Crosslink theme should be placed at `$VUFIND_HOME/thems/Crosslink`. To enable the theme, edit the configuration file in `$VUFIND_LOCAL_DIR/config/vufind/config.ini` and set `theme  = Crosslink`. 

There are no customizations in the theme. It inherits from the bootstrap3 theme. To override templates, copy them from the bootstrap3 theme into a matching directory in the Crosslink theme.

## Configuration.
Configuration is site specific. But the following are useful to start out.
1. ILS Driver in config.ini. Since interaction with an ILS is not yet defined, use the NoILS driver until this is required.
2. Configuration for a solr core is in the "solr" directory. Either create a new core for testing, or replace the schema.xml in the biblio core with the schema.xml file in this repo. 
3. Harvesting: Use VuFind's OAI utilities to harvest and index records from reservoir. A Configuration files for this are included. See the [VuFind OAI documentation](https://vufind.org/wiki/indexing:oai-pmh) for more information.
4. Import: place the files in the 'import' directory in your `$VUFIND_LOCAL_DIR/import` directory. Change the values to match your solr core if necessary. These files contain some very basic configuraitons for reading records from reservoir, but leave the defaults largely in place. 

## Example harvesting workflow.
After configuration, an example harvesting and indexing workflow on linux might look like this:
1. Run the harvest utility: `VUFIND_LOCAL_DIR=/usr/local/vufind/crosslink php /usr/local/vufind/harvest/harvest_oai.php crosslink`
2. Run the batch import script: `VUFIND_LOCAL_DIR=/usr/local/vufind/crosslink /usr/local/vufind/harvest/batch-import-marc.sh crosslink`