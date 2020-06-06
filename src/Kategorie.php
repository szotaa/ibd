<?php

namespace Ibd;

class Kategorie
{
    /**
     * Instancja klasy obsługującej połączenie do bazy.
     *
     * @var Db
     */
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     * Pobiera wszystkie kategorie.
     *
     * @return array
     */
    public function pobierzWszystkie(): array
    {
        $sql = "SELECT * FROM kategorie";

        return $this->db->pobierzWszystko($sql);
    }

    public function dodaj($dane)
    {
        return $this->db->dodaj('kategorie', [
            'nazwa' => $dane['nazwa']
        ]);
    }

    public function usun($id)
    {
        return $this->db->usun('kategorie', $id);
    }

    public function edytuj($dane, $id)
    {
        $update = [
            'nazwa' => $dane['nazwa']
        ];

        return $this->db->aktualizuj('kategorie', $update, $id);
    }

    public function pobierz($id)
    {
        return $this->db->pobierz('kategorie', $id);
    }
}
