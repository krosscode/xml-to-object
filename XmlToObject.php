<?php

namespace KrossCode\XmlToObject;

/**
 * Removes namespaces from XML.
 * @param string $xmlContents
 * @return string
 */
function removeXmlNamespaces(string $xmlContents): string {
	$xmlWithoutXmlnsAtts = preg_replace('/\sxmlns[^"]+"[^"]+"/', '', $xmlContents);
	return preg_replace('/<(\/)?[A-z0-9]{0,}:([^>]+)>/', '<$1$2>', $xmlWithoutXmlnsAtts);
}

/**
 * Converts XML into an object.
 * @param string $xmlContents
 * @return object|false Returns an object on success or FALSE on failure.
 */
function xmlToObject(string $xmlContents) {
	$cleanXml = removeXmlNamespaces($xmlContents);

	$simpleXml = simplexml_load_string($cleanXml);
	if (!$simpleXml) {
		return false;
	}

	$json = json_encode($simpleXml);
	if (!$json) {
		return false;
	}
	
	$object = json_decode($json);
	if (!$object) {
		return false;
	}

	return $object;
}
