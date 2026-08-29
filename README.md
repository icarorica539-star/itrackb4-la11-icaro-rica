# ITRACKB4 Laboratory Activity 3

## Q1. Why did you place the featured route before the detail route?

I placed the featured route before the detail route because the detail route uses `{id}`. If the detail route comes first, Laravel may treat "featured" as an ID.

## Q2. What happens when someone visits an id that does not exist?

When the ID does not exist in the subject data, the application returns a 404 page. I used `abort(404)` in the controller to handle this.

## Q3. Why do your links use route names instead of typed URLs?

I use route names because they make the links easier to maintain. If the URL path changes later, I only need to update the route instead of changing every link.