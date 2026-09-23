# ITRACKB4 Laboratory Activity 6

# Q1. You added a second filter without adding a single route. Explain why no new route was needed. Your answer should say something about what the router actually looks at.

No new route was needed because the router looks at the URL path and method. The filters are query parameters, so the same /subjects route handles them.


# Q2. Suppose you had built both filters as route parameters instead. Describe what the URL for 'year 4 only, no course filter' would have to look like, and why.

It could be /students/4/all. Route parameters are part of the URL, so both values need to be included.


# Q3. Your navigation link stays marked on a detail page and also when a filter is applied. Only one of those two needed a change to your pattern. Say which one, and why the other needed nothing.

The detail-page navigation needed a change because it has to recognize the detail route. The filter needed no change because query parameters still use the same route.


# Q4. You deleted your old filter method but kept the empty store and update methods, even though none of the three can be reached by a URL. Explain the difference between them.

The detail-page navigation needed a change because it has to recognize the detail route. The filter needed no change because query parameters still use the same route.

