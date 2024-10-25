<?php

return array (
  'vufind' => 
  array (
    'plugin_managers' => 
    array (
      'recorddriver' => 
      array (
        'factories' => 
        array (
          'Crosslink\\RecordDriver\\SolrMarc' => 'Crosslink\\RecordDriver\\SolrDefaultFactory',
        ),
        'aliases' => 
        array (
          'VuFind\\RecordDriver\\SolrMarc' => 'Crosslink\\RecordDriver\\SolrMarc',
        ),
        'delegators' => 
        array (
          'Crosslink\\RecordDriver\\SolrMarc' => 
          array (
            0 => 'Crosslink\\RecordDriver\\IlsAwareDelegatorFactory',
          ),
        ),
      ),
    ),
  ),
);