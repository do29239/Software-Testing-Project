describe('template spec', () => {
  it('passes', () => {
    cy.visit('https://example.cypress.io')
  })
})

describe('Homepage Load Test', () => {
    it('Should load the homepage', () => {
        cy.visit('/');
        cy.contains('Welcome to Tessa'); // Adjust the text to match what's on your homepage
    });
});


describe('Authentication Tests', () => {
    it('Should register a new user', () => {
        cy.visit('/register');
        cy.get('input[name="first_name"]').type('Test');
        cy.get('input[name="last_name"]').type('User');
        cy.get('input[name="email"]').type('test2user@user.com');
        cy.get('input[name="address"]').type('123 Test St');
        cy.get('input[name="city"]').type('Test City');
        cy.get('input[name="phone"]').type('1234567890');
        cy.get('input[name="postcode"]').type('12345');
        cy.get('input[name="password"]').type('password');
        cy.get('input[name="password_confirmation"]').type('password');
        cy.get('button.default-btn').contains('Register').click();
        cy.url().should('include', '/'); // Adjust the URL to match your application
        cy.contains('Log Out');
    });

    it('Should login an existing user', () => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('testuser@user.com');
        cy.get('input[name="password"]').type('password');
        cy.get('button.default-btn').contains('Login').click();
        cy.url().should('include', '/'); // Adjust the URL to match your application
        cy.contains('Log Out');
    });
});


describe('Product Search and Filter Tests', () => {

        beforeEach(() => {
        cy.login('user@user.com', 'password'); // Custom command for admin login
    });

    it('Should search for a product', () => {
        cy.visit('/shop'); // Adjust the URL to your shop page

        cy.get('.others-option .search-btn-box .search-btn').first().click({ force: true });

        // Ensure the search overlay is visible
        cy.get('#search-overlay').should('be.visible');

        // Type into the search bar
        cy.get('input#search-bar').type('Fanola');

        // Click the search button
        cy.get('button[type="submit"]').click({multiple:true});

        // Wait for Livewire to update the DOM
        cy.wait(1000); // Adjust the wait time if necessary

        // Add assertions for the product details in the search results
        cy.contains('Shampoo', { timeout: 10000 });
    });

    it('Should filter products by category', () => {
        cy.visit('/shop');
        cy.contains('Categories').next().within(() => {
            cy.get('a').contains('Hair Color').click();
        });
        cy.contains('Hair Color');
    });

    it('Should filter products by brand', () => {
        cy.visit('/shop');
        cy.contains('Brands').next().within(() => {
            cy.get('a').contains('Fanola').click();
        });
        cy.contains('Shampoo');
    });
});


describe('Cart and Checkout Tests', () => {
    it('Should add a product to the cart and proceed to checkout', () => {
        cy.login('user@user.com', 'password'); // Assuming you have a custom command for login
        cy.visit('/shop');

        // Ensure the products are loaded
        cy.get('#products-collections-filter').should('exist');

        // Debug: Check if products-content is visible
        cy.get('.products-content').should('be.visible');

        // Interact with the first product's "Add to Cart" button
        cy.get('.products-content').first().within(() => {
            cy.get('button.default-btn').should('be.visible').click();
        });

        cy.get('.option-item .cart-btn a').first().click({force:true});

        cy.get('#shoppingCartModal').should('be.visible');
        cy.get('a').contains('Checkout').click();

        // Ensure the URL includes '/checkout'
        cy.url().should('include', '/checkout');
    });
});






describe('User Profile Tests', () => {
    it('Should update user profile', () => {
        cy.login('user@user.com', 'password'); // Assuming you have a custom command for login
        cy.visit('/profile');
        cy.get('input[name="first_name"]').clear().type('Updated');
        cy.get('input[name="last_name"]').clear().type('User');
        cy.get('button.default-btn').contains('Save Profile').click();
    });
});


describe('Admin Product Management', () => {
    beforeEach(() => {
        cy.login('admin@admin.com', 'password'); // Custom command for admin login
    });

    it('Should create a new product', () => {
        cy.visit('/products');
        cy.get('input[name="name"]').type('New Product');
        cy.get('textarea[name="description[en]"]').type('Product description in English');
        cy.get('textarea[name="description[mk]"]').type('Product description in Macedonian');
        cy.get('textarea[name="description[shq]"]').type('Product description in Albanian');
        cy.get('input[name="quantity"]').type('10');
        cy.get('input[name="price"]').type('100');
        cy.get('input[name="stylist_price"]').type('80');
        cy.get('input[type="file"]').attachFile('p1.jpg'); // Adjust the file path to an actual image
        cy.get('select[name="brand_id"]').select('1'); // Assuming the first brand in the list
        cy.get('select[name="category_id"]').select('1'); // Assuming the first category in the list
        cy.get('button').contains('Add Product').click();
    });

    it('Should edit an existing product', () => {
        cy.visit('/products/7/edit');
        cy.get('input[name="name"]').clear().type('Updated Product');
        cy.get('textarea[name="description[en]"]').clear().type('Updated description in English');
        cy.get('textarea[name="description[mk]"]').clear().type('Updated description in Macedonian');
        cy.get('textarea[name="description[shq]"]').clear().type('Updated description in Albanian');
        cy.get('input[name="quantity"]').clear().type('20');
        cy.get('input[name="price"]').clear().type('150');
        cy.get('input[name="stylist_price"]').clear().type('120');
        cy.get('input[type="file"]').attachFile('p1.jpg'); // Adjust the file path to an actual image
        cy.get('select[name="brand_id"]').select('2'); // Assuming the second brand in the list
        cy.get('select[name="category_id"]').select('2'); // Assuming the second category in the list
        cy.get('button').contains('Update Product').click();
    });

    it('Should delete a product', () => {
        cy.visit('/products');
        cy.get('button').contains('Delete').first().click();
        cy.on('window:confirm', () => true); // Accept the confirmation dialog
        cy.contains('Product deleted successfully');
    });


    it('Should view a product', () => {
        cy.visit('/products'); // Adjust the URL based on your product page

        // Assuming the first product row should be clicked to view its details
        cy.get('table.table tbody tr').first().click();

        // Add logs for debugging
        cy.log('Navigated to product details page');
        cy.screenshot('product-details-page');

        // Add assertions for the product details
        cy.contains('Description', { timeout: 10000 });
        cy.contains('Quantity', { timeout: 10000 });
        cy.contains('Price', { timeout: 10000 });
    });
});


