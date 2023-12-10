import React from "react";
import { motion } from "framer-motion";
import { HashLoader } from "react-spinners";

const LoadingScreen = () => {
  const blackBox = {
    initial: {
      height: "100vh",
    },
    animate: {
      height: 0,
      transition: {
        duration: 2,
        ease: [8, 0, 0, 0],
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
      y: 0,
      transition: {
        duration: 0,
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
      <motion.div variants={textContainer} className="absolute z-50 flex flex-col items-center">
        <motion.div variants={text} className="text-custom-brown mb-8 text-3xl fill-current">
          KibolAPP
        </motion.div>
        <HashLoader color="#ffffff" loading={true} size={300} />
        <motion.div variants={text} className="text-white mt-8 text-3xl fill-current">
          Loading...
        </motion.div>
      </motion.div>
    </motion.div>
  );
};

export default LoadingScreen;
