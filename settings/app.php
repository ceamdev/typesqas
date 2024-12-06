<?php 
/** APP Configuraciones globales. */
const APP_URL="http://localhost/ceamdev/typesqas/";
const APP_NAME="TYPESQAs";
const APP_VERSION="V1.MVP";
const APP_NAME_BUSINESS="ALPHA MASTER INTERNATIONAL, C.A.";
const APP_SESSION_NAME= "TYPESQASSESIONS";

/** Estableciendo uso horario regional. */
const APP_HUSO_HORARIO = "America/Caracas";
date_default_timezone_set(APP_HUSO_HORARIO);

/** Determinar Hora Local */
$hoy = getdate();
//print_r($hoy);
$fechaLocalHoy = $hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]." ".$hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];