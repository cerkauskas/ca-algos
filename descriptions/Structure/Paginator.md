# Paginator

Pagination is a process for separating content into different pages.

### API *(public methods)*
* *__construct($items, $perPage)* - initializes paginator with given items (data to be paginated) and number that tells how many items per page should be shown.
* *getPages()* - tells amount of pages are present within given context.
* *getForPage($page)* - returns items for a given page. Must throw *InvalidArgumentException* when given page is invalid