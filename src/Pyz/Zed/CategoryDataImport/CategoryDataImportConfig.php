<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CategoryDataImport;


use Spryker\Zed\CategoryDataImport\CategoryDataImportConfig as SprykerCategoryDataImportConfig;

class CategoryDataImportConfig extends SprykerCategoryDataImportConfig
{
    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCategoryDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data/category.csv', static::IMPORT_TYPE_CATEGORY);
    }
}
