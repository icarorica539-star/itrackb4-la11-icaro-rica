# ITRACKB4 Laboratory Activity 10

# G1. Route Model Binding

Route model binding requires the Subject model to be type-hinted and the parameter name $subject to match the {subject} route segment. If either condition is incorrect, Laravel may fail to inject the expected record, and the method will not work as intended.


# G2. Why the Delete Link Gave a 404

My Delete link sent a GET request, but the subjects.destroy route expects a DELETE request. Replacing the link with a POST form containing @csrf and @method('DELETE') allowed Laravel to process the deletion correctly.


# G3. The Second Argument of old()

The second argument of old() supplies the subject's existing value when the edit form first opens. Without it, the fields may be empty; using only the existing value would prevent previously typed values from being restored after validation fails.