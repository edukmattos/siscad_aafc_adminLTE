<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialRepository;

class PatrimonialTypeService
{
	protected $patrimonialRepository;

	public function __construct(
		PatrimonialRepository $patrimonialRepository)
	{
		$this->patrimonialRepository = $patrimonialRepository;
	}

	public function destroy($id)
	{
		if($this->patrimonialRepository->allPatrimonialsByPatrimonialTypeId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}