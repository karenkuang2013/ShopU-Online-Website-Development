<?php

session_start();

/**
 * Class Search - deals with all search data
 */
class Search extends Controller
{   
    public $categories; // List of all categories for categories
                        // section in navbar (loaded from db)
    
    /**
     * Redirect to homepage if user visits /search or /search/index since view
     * doesn't exist! Search controller is only meant to deal with searches.
     */
    public function index()
    {
        header('location: ' . URL . 'home/index');
    }
    
    /**
     * This method works with form input to load data to a user
     */
    public function form()
    {
        $categories = $this->item_model->getAllCategories();

        // check if search bar form was submitted
        if (isset($_GET["submit_search"])) {
            
            // get user input & category from search bar
            $input = trim($_GET['searchbar']);
            $category = $_GET['category'];

            // If a specified category is selected...
            if ($category != 'All') {
                // ...Convert the category selection to its key for db storage
                $categoryId = $this->item_model->getCategoryKey($category);
            } else {
                // ...Otherwise pass 'All' to search all categories
                $categoryId = $category;
            }

            // Need error handling if categoryId gets -1 in return
            // (Invalid category)
            
            // if user searches with blank input, get all items
            // else, get all items containing keyword
            if ($input == "") {
                $items = $this->item_model->getAllItemsFromCategory($categoryId);
            } else {
                $items = $this->item_model->getItemsContaining($input, $categoryId);
            }
            
            $search = $input;
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/_templates/navigation.php';
            
            if ($items == null) {
                require APP . 'view/errors/notfound.php';
            } else {
                require APP . 'view/items/index.php';
            }
            
            require APP . 'view/_templates/footer.php';
            
        } else {
            // redirect to homepage if user visits /search/form without
            // actually searching for an item through the search bar
            header('location: ' . URL . 'home/index');
        }
    }    
}
