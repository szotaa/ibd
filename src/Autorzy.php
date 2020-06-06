<?php

namespace Ibd;

class Autorzy
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
	 * Pobiera zapytanie SELECT z autorami.
	 *
	 * @return array
	 */
	public function pobierzSelect($params = [])
	{
		$sql = "SELECT a.*, (select count(*) from ksiazki k where a.id = k.id_autora) as liczba_ksiazek FROM autorzy a where 1=1 ";

        if(!empty($params['fraza'])) {
            $sql .= " and a.imie like :fraza or a.nazwisko like :fraza";
        }

		if(!empty($params['sortowanie'])){
		    if($params['sortowanie'] == 'a.nazwisko ASC') {
		        $sql .= " order by a.nazwisko ASC";
            }
		    elseif($params['sortowanie'] == 'a.nazwisko DESC') {
		        $sql .= " order by a.nazwisko DESC";
            }
        }

		return ["sql" => $sql, "params" => $params];
	}

	/**
	 * Wykonuje podane w parametrze zapytanie SELECT.
	 * 
	 * @param string $select
	 * @return array
	 */
	public function pobierzWszystko($select, $params = [])
	{
		return $this->db->pobierzWszystko($select, $params);
	}

	/**
	 * Pobiera dane autora o podanym id.
	 * 
	 * @param int $id
	 * @return array
	 */
	public function pobierz($id)
	{
		return $this->db->pobierz('autorzy', $id);
	}

	/**
	 * Dodaje autora.
	 *
	 * @param array $dane
	 * @return int
	 */
	public function dodaj($dane)
	{
		return $this->db->dodaj('autorzy', [
			'imie' => $dane['imie'],
			'nazwisko' => $dane['nazwisko']
		]);
	}

	/**
	 * Usuwa autora.
	 * 
	 * @param int $id
	 * @return bool
	 */
	public function usun($id)
    {

		return $this->db->usun('autorzy', $id);
	}

	/**
	 * Zmienia dane autora.
	 * 
	 * @param array $dane
	 * @param int $id
	 * @return bool
	 */
	public function edytuj($dane, $id)
	{
		$update = [
			'imie' => $dane['imie'],
			'nazwisko' => $dane['nazwisko']
		];
		
		return $this->db->aktualizuj('autorzy', $update, $id);
	}
}
