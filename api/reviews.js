const fs = require("fs");
const path = require("path");

module.exports = (req, res) => {
  try {
    const dataPath = path.join(process.cwd(), "data", "social-reviews.json");
    const raw = fs.readFileSync(dataPath, "utf8");
    const reviews = JSON.parse(raw);

    res.setHeader("Content-Type", "application/json; charset=utf-8");
    res.setHeader("Cache-Control", "no-store");
    res.status(200).json({
      updatedAt: new Date().toISOString(),
      source: "manual-social-feed",
      reviews
    });
  } catch (error) {
    res.status(500).json({
      error: "Failed to load social reviews",
      details: error.message
    });
  }
};
