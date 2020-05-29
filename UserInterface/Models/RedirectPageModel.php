<?php


namespace UserInterface;


class RedirectPageModel
{
    protected $pageTitle;
    protected $heading;
    protected $cardTitle;

//   region Getters and Setters

    /**
     * @return mixed
     */
    public function getCardTitle()
    {
        return $this->cardTitle;
    }

    /**
     * @param mixed $cardTitle
     */
    public function setCardTitle($cardTitle)
    {
        $this->cardTitle = $cardTitle;
    }

    protected $message;

    /**
     * @return mixed
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param mixed $heading
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    protected $redirect;

    /**
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param mixed $redirect
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }
//    endregion
}