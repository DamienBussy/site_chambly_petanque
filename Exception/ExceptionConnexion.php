<?php

class ExceptionConnexion extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null) {
        // Appel du constructeur de la classe parente (Exception)
        parent::__construct($message, $code, $previous);
    }

    // Fonction personnalisée pour afficher l'exception
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
