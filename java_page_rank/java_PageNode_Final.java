import java.util.*;
import java.io.*;

public class PageNode {
	double links;
	double rank;

	// Type = 0 if it's a sentence, = 1 if it's a word
	int type;
	String text;
	//Set<String> words;
	ArrayList<Integer> linkedPages;
	//String originalSentence;
	PageNode() {
		//words = new HashSet<String>();
		linkedPages = new ArrayList<Integer>();
		links = 0.0;
		rank = 0.0;
	}
}

class PageNodeComparator implements Comparator<PageNode> {
@Override
	public int compare(PageNode n1, PageNode n2) {
		if (n1.rank > n2.rank) {
			return -1;
		} else if (n1.rank < n2.rank) {
			return 1;
		} else if (n1.rank == n2.rank) {
			return 0;
		}
		return 0;
	}
}