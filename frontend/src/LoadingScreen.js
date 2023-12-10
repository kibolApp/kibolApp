import React from "react";
import { motion } from "framer-motion";

const LoadingScreen = () => {
  const blackBox = {
    initial: {
      height: "100vh",
    },
    animate: {
      height: 0,
      transition: {
        duration: 2,
        ease: [7, 0, 0, 0],
      },
    },
  };

  const textContainer = {
    initial: {
      opacity: 1,
    },
    animate: {
      opacity: 0,
      transition: {
        duration: 2,
        when: "afterChildren",
      },
    },
  };

  const text = {
    initial: {
      y: 0,
    },
    animate: {
      y: 80,
      transition: {
        duration: 2,
        ease: [0.87, 0, 0.13, 1],
      },
    },
  };

  return (
    <motion.div
      className="absolute z-50 flex items-center justify-center w-full h-full bg-black"
      initial="initial"
      animate="animate"
      variants={blackBox}
    >
      <motion.svg
        variants={textContainer}
        className="absolute z-50 flex"
      >
        <pattern
          id="pattern"
          patternUnits="userSpaceOnUse"
          width={750}
          height={800}
          className="text-white"
        >
          <rect className="w-full h-full fill-current" />
          <motion.rect
            variants={text}
            className="w-full h-full text-gray-600 fill-current"
          />
        </pattern>
        <text
          className="text-4xl font-bold"
          textAnchor="middle"
          x="50%"
          y="50%"
          style={{ fill: "url(#pattern)" }}
        >
          Loading...
        </text>
      </motion.svg>
    </motion.div>
  );
};

export default LoadingScreen;
