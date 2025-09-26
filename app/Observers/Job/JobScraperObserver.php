<?php

namespace App\Observers\Job;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObservers\CrawlObserver;

class JobScraperObserver extends CrawlObserver
{
    private $content;

    public function __construct()
    {
        $this->content = null;
    }

     /*
     * Called when the crawler will crawl the url.
     */
    public function willCrawl(UriInterface $url, ?string $linkText): void
    {
        Log::info('willCrawl', ['url' => $url]);
    }

    /*
     * Called when the crawler has crawled the given url successfully.
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        Log::info("Crawled: {$url}");

        // Handle the response
        $crawler = new Client();
        $crawler = $crawler->request('GET', $url);
        $crawler->filter('.job-listing')->each(function ($node) {
            $title = $node->filter('.job-title')->text();
            $company = $node->filter('.job-company')->text();
            $location = $node->filter('.job-location')->text();
            $description = $node->filter('.job-description')->text();

            // Job::create([
            //     'title' => $title,
            //     'company' => $company,
            //     'location' => $location,
            //     'description' => $description,
            // ]);
        });
    }

    /*
     * Called when the crawler had a problem crawling the given url.
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        Log::error("Failed: {$url}");
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
        Log::info("Finished crawling");
    }

}

    /**
     * How to fire the scrapper
     */

 // $url = "https://laraveljobs.com";

        // $crawledData = Crawler::create()
        //     ->setCrawlObserver(new JobScraperObserver())
        //     ->setMaximumDepth(0)
        //     ->setTotalCrawlLimit(1)
        //     ->startCrawling($url);