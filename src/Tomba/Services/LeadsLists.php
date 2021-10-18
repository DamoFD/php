<?php

namespace Tomba\Services;

use Tomba\TombaException;
use Tomba\Client;
use Tomba\Service;

class LeadsLists extends Service
{
    /**
     * Get Leads Lists
     *
     * Returns a list of leads lists..
     *
     * @throws TombaException
     * @return array
     */
    public function getLists(): array
    {
        $path   = str_replace([], [], '/leads_lists/{id}');
        $params = [];

        return $this->client->call(Client::METHOD_GET, $path, [
            'content-type' => 'application/json',
        ], $params);
    }

    /**
     * Delete List ID
     *
     * Delete a specific list by passing id.
     *
     * @param string $id
     * @throws TombaException
     * @return array
     */
    public function deleteListId(string $id): array
    {
        if (!isset($id)) {
            throw new TombaException('Missing required parameter: "id"');
        }

        $path   = str_replace(['{id}'], [$id], '/leads_lists/{id}');
        $params = [];

        return $this->client->call(Client::METHOD_DELETE, $path, [
            'content-type' => 'application/json',
        ], $params);
    }

    /**
     * Create new List
     *
     * Create a new leads list with the name request parameter
     *
     * @throws TombaException
     * @return array
     */
    public function createList(): array
    {
        $path   = str_replace([], [], '/leads_lists/{id}');
        $params = [];

        return $this->client->call(Client::METHOD_POST, $path, [
            'content-type' => 'application/json',
        ], $params);
    }

    /**
     * Update File
     *
     * Update file by its unique ID. Only users with write permissions have access
     * to update this resource.
     *
     * @param string $fileId
     * @param array $read
     * @param array $write
     * @throws TombaException
     * @return array
     */
    public function updateFile(string $fileId, array $read, array $write): array
    {
        if (!isset($fileId)) {
            throw new TombaException('Missing required parameter: "fileId"');
        }

        if (!isset($read)) {
            throw new TombaException('Missing required parameter: "read"');
        }

        if (!isset($write)) {
            throw new TombaException('Missing required parameter: "write"');
        }

        $path   = str_replace(['{fileId}'], [$fileId], '/leads_lists/{id}');
        $params = [];

        if (!is_null($read)) {
            $params['read'] = $read;
        }

        if (!is_null($write)) {
            $params['write'] = $write;
        }

        return $this->client->call(Client::METHOD_PUT, $path, [
            'content-type' => 'application/json',
        ], $params);
    }
}
