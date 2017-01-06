/*

CSCE 4430 Program 4
Jonathan Roose, Clay Woods, Chase Jacobs (GROUP 4)


		OUTPUT AT THE BOTTOM




Deadline Thursday Dec 1, at noon. Note that as usual, this is a team assignment.

Implement in Java the PageRank algorithm as described at https://en.wikipedia.org/wiki/PageRank, subject to the following requirements:

1) You will be asked to use components in Java Collections to represent your graph.

2) You will need to use multiple threads to spread the work at each iteration step.

3) You will need to test your program for correctness with the graph shown in the Wikipedia picture.

4) You will receive a set of sentences, one per line in a text file. 

You will need to extract the set of all the words in your text file, after converting them to lower case and removing punctuation and stop words, occurring 1 per line in file 

http://www.cse.unt.edu/~tarau/teaching/PL/HomeWorks/stops.txt . 

Let's the set of the remaining words your "dictionary".

5) Imagine that each sentence represents a Web page and that each word in it represents a link.

At the same time each word links back to each sentence in which it occurs.

Run PageRank on the graph obtained by linking each sentence to each word in your dictionary and each word to each sentence in which it occurs. To test your program, use the file 

http://www.cse.unt.edu/~tarau/teaching/PL/HomeWorks/story.txt .

We ask you to print out:

a) the 10 highest ranked sentences, in the order they appear in the text
b) the 10 highest ranked keywords, ordered by rank, highest ranked first

Hint: you may want to look at some of the multi-threaded PageRank implementations in Java, at github:

https://github.com/search?l=Java&q=pagerank+threads&type=Code&utf8=%E2%9C%93

Needless to say, after looking at them, make sure you write your own
*/

import java.util.*;
import java.io.*;
import java.lang.*;

class PageRankThread implements Runnable {
	ArrayList<PageNode> myNodes;

	PageRankThread(ArrayList<PageNode> nodes)
	{
		myNodes = nodes;
	}

	public void run()
	{
		int iteration, i, j;
		double damping = 0.85, sum;
			for (i = 0; i < myNodes.size(); ++i)
			{
				sum = 0.0;
				// Find sum of page ranks divided by outbound links of
				// every other node except for the node itself
				for (j = 0; j < myNodes.get(i).linkedPages.size(); ++j)
				{
					sum += myNodes.get(myNodes.get(i).linkedPages.get(j)).rank / myNodes.get(myNodes.get(i).linkedPages.get(j)).links;
				}
				
				// Multiply sum by damping factor
				sum *= damping;
				
				// Add sum to 1 - damping divided by number of nodes
				sum += (1.0 - damping) / (double) myNodes.size();
				
				// Finally, assign this sum as the new rank of node i
				myNodes.get(i).rank = sum;
			}
	}
}

public class PageRank{
	public static void main(String[] args) throws IOException {
		// Create set for stop words and read them in
		Set<String> stopWords = new HashSet<String>();
		try (BufferedReader br = new BufferedReader(new FileReader(args[0]))) 
		{
			String line;
			while ((line = br.readLine()) != null) 
			{
				line = line.replaceAll("[^a-zA-Z ]", "").toLowerCase();
				stopWords.add(line);
			}
		}
		
		/* OUTDATED DUE TO CHANGES TO ASSIGNMENT
		 * Create a master dictionary set, as well as an ArrayList of PageNodes
		 * to store every line of the story.txt input file. This is a multistep
		 * process.
		 * 
		 * 	1 - First, read in a line.
		 * 
		 * 	2 - With that line, create an array of words that has all
		 * 	punctuation and symbols stripped, as well as every word converted
		 * 	to lowercase.
		 * 
		 * 	3 - Then iterate through the array of words (string array) and
		 * 	remove any element that also exists within the stop words set.
		 * 
		 * 	4 - Then iterate through all of the words that remain in the
		 * 	current array of words, and add them to the master dictionary.
		 * 	If the word does not yet exist in the dictionary, add it to the
		 * 	dictionary with value 1. If the word does exist in the dictionary,
		 * 	then take the current value, add 1 to it, then replace the old
		 * 	current value with the new value of +1 for that word.
		 * 
		 * 	5 - Afterwords or during the above step, add the word to an ArrayList
		 * 	in the node itself. NO LONGER HAPPENS.
		 * 
		 * 	6 - Once all lines from the story are read, and all words have
		 * 	been added to the master dictionary, go through each node, and
		 * 	have each node check every node after to see if there is at least
		 * 	one word in common between the sets of words for each node. If there
		 * 	is, add one to the links for both nodes. Otherwise, continue.
		 *	MOST IS NOW STEP 4. JUST SETS INITIAL RANKS.
		 * 
		 * 	7 - Finally, the PageRank algorithm can begin.
		 * */
		Map<String, Integer> masterMap = new LinkedHashMap<String, Integer>();
		ArrayList<PageNode> nodes = new ArrayList<PageNode>();
		int totalLinks = 0;
		try (BufferedReader br = new BufferedReader(new FileReader(args[1]))) 
		{
			// Step 1
			int i, j, currentSentence, currentWord;
			String line;
			while ((line = br.readLine()) != null) 
			{
				// Add new PageNode to nodes map and insert the original sentence
				nodes.add(new PageNode());
				nodes.get(nodes.size() - 1).text = line;
				nodes.get(nodes.size() - 1).type = 0;
				currentSentence = nodes.size() - 1;				

				// Step 2
				String[] temp = line.replaceAll("[^a-zA-Z ]", "").toLowerCase().split("\\s+");
				ArrayList<String> words = new ArrayList<String>(Arrays.asList(temp));
				
				// Step 3
				for (Iterator<String> iterator = words.iterator(); iterator.hasNext();)
				{
					String stopWord = iterator.next();
					if (stopWords.contains(stopWord))
					{
						iterator.remove();
					}
				}
				
				// Step 4
				for (i = 0; i < words.size(); ++i)
				{
					// Check if word is already in masterMap
					if (masterMap.containsKey(words.get(i)))
					{
						// Find the word, and link it to the current sentence and vice versa
						for (j = 0; j < nodes.size(); ++j)
						{
							if (nodes.get(j).text.equals(words.get(i)))
							{
								currentWord = j;
								nodes.get(currentWord).linkedPages.add(currentSentence);
								nodes.get(currentSentence).linkedPages.add(currentWord);
								nodes.get(currentWord).links += 1.0;
								nodes.get(currentSentence).links += 1.0;
								break;
							}
						}
					}
					else
					{
						// Otherwise, create a node for the word
						// and link it to the currentPage
						nodes.add(new PageNode());
						nodes.get(nodes.size() - 1).text = words.get(i);
						nodes.get(nodes.size() - 1).type = 1;
						currentWord = nodes.size() - 1;

						nodes.get(currentWord).linkedPages.add(currentSentence);
						nodes.get(currentSentence).linkedPages.add(currentWord);
						nodes.get(currentWord).links += 1.0;
						nodes.get(currentSentence).links += 1.0;

						masterMap.put(words.get(i), 1);
					}
				}
			}
			// Step 6
			for (i = 0; i < nodes.size(); ++i)
			{
				nodes.get(i).rank = 1.0 / nodes.size();
			}
		}
		
		// Finally, the pagerank algorithm can begin. Repeat the process
		// at least 100 times.
		Runnable[] thread;
		thread = new Runnable[100];
		int i;
		for (i = 0; i < 100; ++i)
		{
			thread[i] = new PageRankThread(nodes);
			new Thread(thread[i]).start();
		}
		/*int iteration, i, j;
		double damping = 0.85, sum;
		for (iteration = 0; iteration < 1000; ++iteration)
		{
			for (i = 0; i < nodes.size(); ++i)
			{
				sum = 0.0;
				// Find sum of page ranks divided by outbound links of
				// every other node except for the node itself
				for (j = 0; j < nodes.get(i).linkedPages.size(); ++j)
				{
					sum += nodes.get(nodes.get(i).linkedPages.get(j)).rank / nodes.get(nodes.get(i).linkedPages.get(j)).links;
				}
				
				// Multiply sum by damping factor
				sum *= damping;
				
				// Add sum to 1 - damping divided by number of nodes
				sum += (1.0 - damping) / (double) nodes.size();
				
				// Finally, assign this sum as the new rank of node i
				nodes.get(i).rank = sum;
			}
		}*/
		
		// Sort the pages by rank, along with the hash map of most pop
		Collections.sort(nodes, new PageNodeComparator());
		//masterMap = sortByValue(masterMap);
		
		// Print out sentences with top 10 ranks
		System.out.println("**** TEN HIGHEST RANKED SENTENCES ****");
		int counter = 0;
		i = 0;
		while(counter < 10)
		{
			if (nodes.get(i).type == 0)
			{
				System.out.println((counter+1) + ") \tSENTENCE: " + nodes.get(i).text);
				System.out.println("\tRANK: " + nodes.get(i).rank);
				System.out.println("");
				counter += 1;
			}
			i += 1;
		}

		System.out.println("**** TEN HIGHEST RANKED WORDS ****");
		counter = 0;
		i = 0;
		while(counter < 10)
		{
			if (nodes.get(i).type == 1)
			{
				System.out.println((counter+1) + ") \tWORD: " + nodes.get(i).text);
				System.out.println("\tRANK: " + nodes.get(i).rank);
				System.out.println("");
				counter += 1;
			}
			i += 1;
		}
	}
}

/*

**** TEN HIGHEST RANKED SENTENCES ****
1) 	SENTENCE: The next pictures, taken at a great distance, showed a towering wounded soldier sitting by the side of a path, his arm in a sling, the stump of one leg extended, a crude crutch on his lap.
	RANK: 0.0011468266760432367

2) 	SENTENCE: Now there were numerous metal spheres crawling over the prostrate body, dull metal globes clicking and whirring, sawing up the Russian into small parts to be carried away.
	RANK: 0.0010127009121468078

3) 	SENTENCE: He could make out the intricate brain, wires and relays, tiny tubes and switches, thousands of minute studs-- A robot, the soldier holding his arm said.
	RANK: 9.55444143948858E-4

4) 	SENTENCE: Bare trunks of trees jutted up occasionally; the ground was level and bare, rubble-strewn, with the ruins of buildings standing out here and there like yellowing skulls.
	RANK: 8.984856419072833E-4

5) 	SENTENCE: Leone pondered as the communications officer raised the outside antenna cautiously, scanning the sky above the bunker for any sign of a watching Russian ship.
	RANK: 8.20179945345125E-4

6) 	SENTENCE: But when you're over the Appenine, signal with one red flare and a green flare, followed by two red flares in quick succession.
	RANK: 8.090769497073061E-4

7) 	SENTENCE: He picked up his rifle and stepped carefully up to the mouth of the bunker, making his way between blocks of concrete and steel prongs, twisted and bent.
	RANK: 7.734838417628207E-4

8) 	SENTENCE: He adjusted the view sight so the Russian's features squarely filled the glass, the lines cutting across his hard, somber features.
	RANK: 7.711864494996652E-4

9) 	SENTENCE: Radiation tabs protected the UN troops, but if a man lost his tab he was fair game for the claws, no matter what his uniform.
	RANK: 7.676759737851882E-4

10) 	SENTENCE: They were living things, spinning, creeping, shaking themselves up suddenly from the gray ash and darting toward a man, climbing up him, rushing for his throat.
	RANK: 7.475005161733918E-4

**** TEN HIGHEST RANKED WORDS ****
1) 	WORD: hendricks
	RANK: 0.011689525372639311

2) 	WORD: said
	RANK: 0.00503684131497303

3) 	WORD: tasso
	RANK: 0.004614969874305764

4) 	WORD: klaus
	RANK: 0.004590422906996882

5) 	WORD: way
	RANK: 0.003203082640284411

6) 	WORD: came
	RANK: 0.0029492384777411273

7) 	WORD: come
	RANK: 0.0029238374411166153

8) 	WORD: ash
	RANK: 0.002523315466305436

9) 	WORD: bunker
	RANK: 0.002488871111254253

10) 	WORD: claws
	RANK: 0.002488740654343791


*/