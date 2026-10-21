# ITRACKB4 Laboratory Activity 10

# G1. Which column did you turn into a table, and why that one and not another?

I converted the prerequisite column into a separate prerequisites table because its values come from a fixed list and can be reused by multiple subjects. This avoids repeating prerequisite text and allows each subject to reference a valid lookup record through prerequisite_id.


# G2. What number did Screenshot 6 show, and why exactly that number?


Screenshot 6 showed 6 queries when five subjects were displayed. One query retrieved the subjects, and five additional queries retrieved each subject's prerequisite individually. After adding with('prerequisite'), the query count decreased to two.



# G3. Your belongsTo method is named in the singular. What would break if you made it plural?

The relationship method is named prerequisite() because each subject belongs to one prerequisite record. If I named it prerequisites(), Eloquent would infer a foreign key named prerequisites_id, which does not match the actual prerequisite_id column, unless I explicitly configured the relationship.