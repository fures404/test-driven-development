<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function setUp(): void
    {
        $this->article = new App\Article;
    }
    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), ""); //assertEquals is passed if return "";
    }

    public function titleProviders() //this isn't test method so it doesn't need to start with the word "test"
    {
        return [
            'Slug Has Spaces Replaced By Underscores'
                                        => ["An example article", "An_example_article"],
            'Slug Has Whitespace Replaced By Single Underscore'
                                        => ["An    example    \n    article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore'
                                        => [" An example article ", "An_example_article"],
            'Slug Does Not Have Any Non Word Characters'
                                        => ["Read! This! Now!", "Read_This_Now"]
        ];
    }

    /**
     * @param $title
     * @param $slug
     *
     * @dataProvider titleProviders
     */
    /* test method will be called four time */
    public function testSlug($title, $slug) //these values will come form a data provider method.
        //Data provider methods need to return a collections of arrays either by using an array or an object
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}
    /*
    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplacedByUnderscores()
    {
        $this->article->title = "An    example    \n article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscores() //check if slug start or end with and underscore
    {
        $this->article->title = "An example article ";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters() //check if slug start or end with and underscore
    {
        $this->article->title = "Read! This! Now!";

        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }
    /*
