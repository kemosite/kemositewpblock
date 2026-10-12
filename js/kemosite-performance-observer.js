let kemositeObserver = new PerformanceObserver( ( list, obs ) => {

  // Log all entries
  let perfEntries = list.getEntries();
  perfEntries.forEach( ( entry ) => {
    console.log( `${entry.name}'s start time: ${entry.startTime}` );
    console.log( `${entry.name}'s duration: ${entry.duration}` );
  });

});

// Subscribe to various performance event types
kemositeObserver.observe({
  entryTypes: [
    "element",
    "event",
    "first-input",
    "interaction-contentful-paint",
    "largest-contentful-paint",
    "layout-shift",
    "long-animation-frame",
    "longtask",
    "mark",
    "measure",
    "navigation",
    "paint",
    "resource",
    "taskattribution",
    "visibility-state"
  ]
});