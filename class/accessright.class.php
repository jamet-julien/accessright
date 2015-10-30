<?php

/*
derniére modification date du 07/06/12
*/

class AccessRight {
	private	$_iAccess	=	0;

	/**
	 * [__construct description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @param  integer    $_iAccess [description]
	 */
	public function __construct( $_iAccess=0){
		$this->_iAccess	=	(int) $_iAccess;
	}

	/**
	 * [checkAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @param  integer    $iAccess [description]
	 * @return [boolean]          [description]
	 */
	public function checkAccess( $iAccess=0){
		return ($this->_iAccess & $iAccess);
	}

	/**
	 * [computeAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @param  array      $array [description]
	 * @return [int]            [description]
	 */
	public function computeAccess( $array=array()){
		$iAccessCompute	=	0;

		if( is_array( $array) and count( $array)){

			foreach($array as $iAccess){
				$iAccessCompute |= (int) $iAccess;
			}

		}

		return $iAccessCompute;
	}

	/**
	 * [deleteAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @return [boolean]     [description]
	 */
	public function deleteAccess(){
		$aAccess = func_get_args();

		if( is_array( $aAccess) and count( $aAccess)){

			$iAccessCompute	=	0;

			foreach( $aAccess as $iAccess){

				if( is_int( $iAccess)){
					$iAccessCompute |= $iAccess;
				}
			}

			$this->_iAccess &= ~( $iAccessCompute);

			return true;
		}else{
			return false;
		}
	}

	/**
	 * [addAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @return [boolean]  $bResult  [description]
	 */
	public function addAccess(){
		$aAccess = func_get_args();
		$bResult = false;

		if( is_array( $aAccess) and count( $aAccess)){

			foreach( $aAccess as $iAccess){
				if( is_int( $iAccess)){
					$this->_iAccess |= $iAccess;
				}
			}

			$bResult = true;
		}

		return $bResult;
	}

	/**
	 * [getAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-29
	 * @return [int]     [description]
	 */
	public function getAccess(){
		return  $this->_iAccess;
	}

	/**
	 * [getBinAccess description]
	 * @author Julien Jamet
	 * @date   2015-10-30
	 * @return [int]     [valeur en bianire des access]
	 */
	public function getBinAccess(){
		return decbin( $this->_iAccess);
	}
	/*
	*/
}

?>