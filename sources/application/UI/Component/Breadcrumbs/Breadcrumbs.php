<?php
/**
 * Copyright (C) 2013-2020 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Application\UI\Component\Breadcrumbs;


use Combodo\iTop\Application\UI\UIBlock;
use MetaModel;
use utils;

/**
 * Class Breadcrumbs
 *
 * @author Guillaume Lajarige <guillaume.lajarige@combodo.com>
 * @package Combodo\iTop\Application\UI\Component\Breadcrumbs
 * @internal
 * @since 2.8.0
 */
class Breadcrumbs extends UIBlock
{
	// Overloaded constants
	public const BLOCK_CODE = 'ibo-breadcrumbs';
	public const HTML_TEMPLATE_REL_PATH = 'components/breadcrumbs/layout';
	public const JS_TEMPLATE_REL_PATH = 'components/breadcrumbs/layout';
	public const JS_FILES_REL_PATH = [
		'js/components/breadcrumbs.js',
	];

	/** @var array|null $aNewEntry */
	protected $aNewEntry;

	/**
	 * QuickCreate constructor.
	 *
	 * @param array|null $aNewEntry
	 * @param string|null $sId
	 */
	public function __construct($aNewEntry = null, $sId = null)
	{
		parent::__construct($sId);
		$this->SetNewEntry($aNewEntry);
	}

	/**
	 * The new breadcrumbs entry
	 *
	 * @param array|null $aNewEntry
	 *
	 * @return $this
	 */
	public function SetNewEntry($aNewEntry)
	{
		$this->aNewEntry = $aNewEntry;
		return $this;
	}

	/**
	 * @return array|null
	 */
	public function GetNewEntry()
	{
		return $this->aNewEntry;
	}

	/**
	 * @return array
	 * @throws \ConfigException
	 * @throws \CoreException
	 * @throws \Exception
	 */
	public function GetJsWidgetOptions()
	{
		$aJsWidgetOptions = [];

		$iBreadCrumbMaxCount = utils::GetConfig()->Get('breadcrumb.max_count');
		if ($iBreadCrumbMaxCount > 1)
		{
			$oConfig = MetaModel::GetConfig();
			$siTopInstanceId = $oConfig->GetItopInstanceid();

			$aJsWidgetOptions = [
				'itop_instance_id' => $siTopInstanceId,
				'max_count' => $iBreadCrumbMaxCount,
				'new_entry' => $this->GetNewEntry(),
			];
		}

		return $aJsWidgetOptions;
	}
}