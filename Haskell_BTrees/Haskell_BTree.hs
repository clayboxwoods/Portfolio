{-
Write a Haskell function that generates all binary trees with empty leaves of size n. 

Then, given a binary tree, write a function that counts the number of leaves 
and another function that counts the number of internal nodes(non-leafs). 

What do you observe about the two results? 
Write a short proof by induction as a comment added to your program stating that your observation applies to binary trees of any size.

Deadline Thursday Nov 10, at noon.
-}

--dont mess with polymorphic types

--BT = L | Branch make of BT and BT
--	deriving (eg,read,show)
	
data BTree a = Leaf a | Branch (BTree a) (BTree a) 
  deriving (Eq,Show,Read)
  
  --variables  
t1 = Branch (Leaf "apple") (Leaf "pear")
t2 = Branch (Leaf "orange") (Leaf "garlic")

t3 = Branch t1 (Branch t1 t2)

countLeaves :: BTree a -> Int
countLeaves (Leaf n) = 1
countLeaves (Branch x y) = countLeaves x + countLeaves y

countInternal :: BTree a -> Int
countInternal (Leaf n) = 0
countInternal (Branch x y) = countInternal x + countInternal y + 1

{-

-}
