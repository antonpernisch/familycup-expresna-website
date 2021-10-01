<?php
class VisualHelper {
    protected $homePath;

    function __construct( $hpath ) {
        $this->homePath = $hpath;
        return true;
    }

    function GetBlock( $path ) {
        try {
            return file_get_contents( $this->homePath . "/" . $path . ".html" );
        } catch( Exception $e ) {
            return "WARN: Nepodarilo sa načítať vizuálny blok<br />[$e]";
        }
    }

    function HideID( $id ) {
        echo "<script>Visual.HideID( '$id' );</script>";
        return true;
    }

    function ChangeContent( $id, $newcontent ) {
        echo "<script>Visual.ChangeContent( '$id', '$newcontent' );</script>";
        return true;
    }
}