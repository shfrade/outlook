<?php

namespace Symplicity\Outlook\Interfaces;

use Symplicity\Outlook\Exception\ReadError;
use Symplicity\Outlook\Interfaces\Entity\ReaderEntityInterface;

interface CalendarInterface
{
    /**
     * Set request as pool request
     * @return CalendarInterface
     */
    public function isBatchRequest(): CalendarInterface;

    /**
     * Once event has been accessed from outlook, use the method to save event to your database
     * @param ReaderEntityInterface $reader
     * @return void
     */
    public function saveEventLocal(ReaderEntityInterface $reader) : void;

    /**
     * When event is deleted, this method will be called.
     * @param ReaderEntityInterface $event
     * @return void
     */
    public function deleteEventLocal(ReaderEntityInterface $event) : void;

    /**
     * Gets all the events to be sent to outlook
     * @return array Return array of WriteInterface Entities, example [Write(....), Write(....)]
     */
    public function getLocalEvents() : array;

    /**
     * Passed by handler fulfillment
     * @param array $responses
     */
    public function handlePoolResponses(array $responses = []) : void;

    /**
     * Passed by Guzzle single async requestor
     * @param $failedToWrite
     */
    public function handleResponse(array $failedToWrite = []) : void;

    /**
     * Method that handles the sync
     * @throws ReadError
     * @param array $params
     */
    public function sync(array $params = []) : void;

    /**
     * Method to get & process a single event
     * url : /me/events/{{eventId}}
     * @param string $url
     * @param array $params
     */
    public function getEvent(string $url, array $params = []) : ?ReaderEntityInterface;

    /**
     * Method to get all instances of a series master
     * url : /me/events/{{eventId}}/instances
     * @param string $url
     * @param array $params
     */
    public function getEventInstances(string $url, array $params = []) : void;
}
