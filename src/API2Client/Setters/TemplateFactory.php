<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

namespace API2Client\Setters;


use API2Client\Entities\Template;

class TemplateFactory extends FactoryAbstract implements FactoryInterface
{
    /**
     * @param array $data
     * @return Template|mixed
     */
    public function create ($data)
    {
        $template = new Template ();

        $this->setGeneral ($template, $data);
        $this->setType ($template, $data);
        $this->setAuthor ($template, $data);
        $this->setProperties ($template, $data);
        $this->setScreenShotsList ($template, $data);
        $this->setStyles ($template, $data);
        $this->setCategories ($template, $data);
        $this->setSources ($template, $data);
        $this->setSoftware ($template, $data);
        $this->setPages ($template, $data);

        return $template;
    }


    /**
     * @param Template $template
     * @param $data
     */
    private function setGeneral (Template $template, $data)
    {
        $template->setId ($this->getValue ('id', $data, 0));
        $template->setState ($this->getValue ('state', $data));
        $template->setPrice ($this->getValue ('price', $data));
        $template->setExcPrice ($this->getValue ('exc_price', $data));
        $template->setDownloads ($this->getValue ('downloads', $data));
        $template->setIsFlash ($this->getValue ('is_flash', $data, 0));
        $template->setIsAdult ($this->getValue ('is_adult', $data, 0));
        $template->setIsFullSite ($this->getValue ('is_full_site', $data, 0));

        $template->setInsertedDate (
            $this->createDateFromString ($this->getValue ('inserted_date', $data, ''), 'Y-m-d H:i:s', new \DateTime ())
        );
        $template->setUpdateDate (
            $this->createDateFromString ($this->getValue ('update_date', $data, ''), 'Y-m-d H:i:s', new \DateTime ())
        );

        $template->setIsRealSize ($this->getValue ('is_real_size', $data, 0));
        $template->setSoftwareRequired ($this->getValue ('software_required', $data, ''));
        $template->setPackageId ($this->getValue ('package_id', $this->getValue ('package', $data, array ()), 0));
        $template->setKeywords ($this->getValue ('keywords', $data));
        $template->setSources ($this->getValue ('sources', $data, ''));
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setType (Template $template, $data)
    {
        $type = new Template\Type ();

        $tType = $this->getValue ('template_type', $data, array ());

        $type->setId ($this->getValue ('type_id', $tType, 0));
        $type->setName ($this->getValue ('type_name', $tType, ''));

        $template->setType ($type);
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setPages (Template $template, $data)
    {
        foreach ($this->getValue ('pages', $data, array ()) as $page_data)
        {
            $page  = new Template\Page ();

            $page->setName ($this->getValue ('category_id', $page_data, 0));


            foreach ($this->getValue ('screenshots', $page_data, array ()) as $page_screen_data)
            {
                $page_screen = new Template\PageScreenShot ();

                $page_screen->setUrl ($this->getValue ('uri', $page_screen_data, ''));
                $page_screen->setType ($this->getValue ('scr_type_id', $page_screen_data, 0));
                $page_screen->setDescription ($this->getValue ('description', $page_screen_data, ''));
                $page_screen->setHeight ($this->getValue ('height', $page_screen_data, 0));
                $page_screen->setWidth ($this->getValue ('width', $page_screen_data, 0));

                $page->addScreenShot ($page_screen);
            }
            $template->addPage ($page);
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setSoftware (Template $template, $data)
    {
        foreach ($this->getValue ('software_required_list', $data, array ()) as $software_required_list)
        {
            $template->addSoftwareRequiredToList ($this->getValue ('software_id', $software_required_list, 0));
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setAuthor (Template $template, $data)
    {
        $author = new Template\Author ();

        $tAuthor = $this->getValue ('author', $data, array ());

        $author->setId ($this->getValue ('author_id', $tAuthor, 0));
        $author->setNick ($this->getValue ('author_nick', $tAuthor, ''));

        $template->setAuthor ($author);
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setProperties (Template $template, $data)
    {
        foreach ($this->getValue ('properties', $data, array ()) as $property_data)
        {
            $property  = new Template\Property ();

            $property->setPropertyName ($this->getValue ('propertyName', $property_data, ''));

            foreach ($this->getValue ('propertyValues', $property_data, array ()) as $propertyValue)
            {
                $property->addValue ($propertyValue);
            }
            $template->addProperty ($property);
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setSources (Template $template, $data)
    {
        foreach ($this->getValue ('sources_available_list', $data, array ()) as $sources_available_list)
        {
            $template->addtSourcesAvailableToList ($this->getValue ('source_id', $sources_available_list, 0));
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setScreenShotsList (Template $template, $data)
    {
        foreach ($this->getValue ('screenshots_list', $data, array ()) as $screenshots_list)
        {
            $screen  = new Template\ScreenShot ();

            $screen->setFilemtime ($this->createDateFromString ($this->getValue ('filemtime', $data, ''), 'Y-m-d H:i:s'), new \DateTime());
            $screen->setUrl ($this->getValue ('uri', $screenshots_list, ''));

            $template->addScreenShot ($screen);
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setStyles (Template $template, $data)
    {
        foreach ($this->getValue ('styles', $data, array ()) as $style_data)
        {
            $style  = new Template\Style ();

            $style->setId ($this->getValue ('uri', $style_data, 0));
            $style->setName ($this->getValue ('uri', $style_data, ''));

            $template->addStyle ($style);
        }
    }

    /**
     * @param Template $template
     * @param $data
     */
    private function setCategories (Template $template, $data)
    {
        foreach ($this->getValue ('categories', $data, array ()) as $category_date)
        {
            $category  = new Template\Category ();

            $category->setId ($this->getValue ('category_id', $category_date, 0));
            $category->setName ($this->getValue ('category_name', $category_date, ''));

            $template->addCategory ($category);
        }
    }
}