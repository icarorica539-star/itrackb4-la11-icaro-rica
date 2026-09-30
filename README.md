# ITRACKB4 Laboratory Activity 6

# Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

If it used GET, the form data would appear in the URL. When the browser is refreshed, it may repeat the request and cause the same data to be submitted again. This could create duplicate records.


# Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

Laravel's validation automatically stops the controller from continuing when validation fails. It redirects the visitor back to the previous form page and provides the validation errors.

# Q3. Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

The success message only appears when a success message exists in the session. Laravel stores it temporarily after a successful action, so other pages do not show it when there is no success message.
