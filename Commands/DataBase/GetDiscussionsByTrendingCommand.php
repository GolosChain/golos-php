<?php


namespace GolosPHP\Commands\DataBase;


use GolosPHP\Connectors\ConnectorInterface;

class GetDiscussionsByTrendingCommand extends CommandAbstract
{
    protected $method       = 'get_discussions_by_trending';
    protected $queryDataMap = [
        ConnectorInterface::PLATFORM_GOLOS   => [
            '*:limit'            => ['integer'], //the discussions return amount top limit
            '*:select_tags:*'    => ['nullOrString'], //list of tags to include, posts without these tags are filtered
            '*:select_authors:*' => ['nullOrString'], //list of authors to select
            '*:truncate_body'    => ['nullOrInteger'], //the amount of bytes of the post body to return, 0 for all
            '*:start_author'     => ['nullOrString'], //the author of discussion to start searching from
            '*:start_permlink'   => ['nullOrString'], //the permlink of discussion to start searching from
            '*:parent_author'    => ['nullOrString'], //the author of parent discussion
            '*:parent_permlink'  => ['nullOrString'] //the permlink of parent discussion
        ],
        ConnectorInterface::PLATFORM_STEEMIT => [
            '*:tag'            => ['nullOrString'], //'author',
            '*:limit'          => ['integer'], //'limit'
            '*:start_author'   => ['nullOrString'], //'start_author' for pagination,
            '*:start_permlink' => ['nullOrString'] //'start_permlink' for pagination,
        ]
    ];
}