/*
 Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.txt or http://cksource.com/ckfinder/license
 */

var config = {};

// Set your configuration options below.

// Examples:
// config.language = 'pl';
 config.skin = 'jquery-mobile';
if ( tmp == get( 'langCode' ) ){

    if(tmp == "zh"){
        config.language = "zh-tw";
    }
    else{
        config.language = tmp;
    }
}

console.log(config)
CKFinder.define( config );
